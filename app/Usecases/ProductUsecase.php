<?php

namespace App\Usecases;

use App\Entities\DatabaseEntity;
use App\Entities\ResponseEntity;
use App\Http\Presenter\Response;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;


class ProductUsecase extends Usecase
{
  public string $className;

  public function __construct()
  {
    $this->className = 'ProductUsecase';
  }

  public function getAll(array $filterData = [])
  {
    $funcName = $this->className . '.getAll';

    $page       = $filterData['page'] ?? 1;
    $limit      = $filterData['limit'] ?? 10;
    $page       = ($page > 0 ? $page : 1);

    $filterName         = $filterData['filter_name'] ?? "";
    $filterCategoryID   = $filterData['filter_category_id'] ?? "";

    try {
      $data = DB::connection(DatabaseEntity::SQL_READ)
        ->table(DatabaseEntity::PRODUCT, 'p')
        ->leftJoin('product_categories as pc', 'pc.id', '=', 'p.product_category_id')
        ->whereNull('p.deleted_at');

      if (!empty($filterName)) {
        $data = $data->where('p.name', 'like', '%' . $filterName . '%');
      }
      if (!empty($filterCategoryID)) {
        $data = $data->where('p.product_category_id', $filterCategoryID);
      }

      $fields = ['p.*', 'pc.name as category'];
      $data = $data->orderBy('p.created_at', 'desc')->paginate(20, $fields);

      return Response::buildSuccess(
        [
          'list' => $data,
          'pagination' => [
            'current_page' => (int) $page,
            'limit' => (int) $limit,
          ]
        ],
        ResponseEntity::HTTP_SUCCESS
      );
    } catch (\Exception $e) {
      Log::error($e->getMessage(), [
        "func_name" => $funcName,
        'user' => Auth::user()
      ]);

      return Response::buildErrorService($e->getMessage());
    }
  }

  public function getByID(int $id): array
  {
    $funcName = $this->className . ".getByID";

    try {
      $data = DB::connection(DatabaseEntity::SQL_READ)
        ->table(DatabaseEntity::PRODUCT)
        ->whereNull("deleted_at")
        ->where('id', $id)
        ->first();

      return Response::buildSuccess(
        data: collect($data)->toArray()
      );
    } catch (\Exception $e) {
      Log::error($e->getMessage(), [
        "func_name" => $funcName,
        'user' => Auth::user()
      ]);

      return Response::buildErrorService($e->getMessage());
    }
  }

  public function getDetailByID(int $id): array
  {
    $funcName = $this->className . ".getByID";

    try {
      $data = DB::connection(DatabaseEntity::SQL_READ)
        ->table(DatabaseEntity::PRODUCT, 'p')
        ->leftJoin("product_categories as pc", "pc.id", "=", "p.product_category_id")
        ->whereNull("p.deleted_at")
        ->where('p.id', $id)
        ->first(['p.*', 'pc.name as category']);

      return Response::buildSuccess(
        data: collect($data)->toArray()
      );
    } catch (\Exception $e) {
      Log::error($e->getMessage(), [
        "func_name" => $funcName,
        'user' => Auth::user()
      ]);

      return Response::buildErrorService($e->getMessage());
    }
  }

  public function create(Request $data): array
  {
    $funcName = $this->className . ".create";

    $validator = Validator::make($data->all(), [
      'name' => 'required',
    ]);

    $customAttributes = [
      'name' => 'Nama Kategori',
    ];
    $validator->setAttributeNames($customAttributes);
    $validator->validate();

    DB::beginTransaction();
    try {
      $productID =  DB::table(DatabaseEntity::PRODUCT)
        ->insertGetId([
          'name'           => $data['name'],
          'product_category_id'    => $data['product_category_id'],
          'price' => $data['price'],
          'created_by'     => Auth::user()->id,
          'created_at'     => datetime_now()
        ]);

      DB::commit();

      return Response::buildSuccessCreated();
    } catch (\Exception $e) {
      DB::rollback();

      Log::error($e->getMessage(), [
        "func_name" => $funcName,
        'user' => Auth::user()
      ]);
      return Response::buildErrorService($e->getMessage());
    }
  }

  public function update(Request $data, int $id): array
  {
    $return = [];
    $funcName = $this->className . ".update";

    $validator = Validator::make($data->all(), [
      'name' => 'required',
    ]);

    $customAttributes = [
      'name' => 'Nama Kategori',
    ];
    $validator->setAttributeNames($customAttributes);
    $validator->validate();

    $update = [
      'name'           => $data['name'],
      'product_category_id'    => $data['product_category_id'],
      'price'  => $data['price'],
      'updated_by'     => Auth::user()->id,
      'updated_at'     => datetime_now()
    ];

    DB::beginTransaction();

    try {
      DB::table(DatabaseEntity::PRODUCT)
        ->where("id", $id)
        ->update($update);

      DB::commit();

      $return = Response::buildSuccess(
        message: ResponseEntity::SUCCESS_MESSAGE_UPDATED
      );
    } catch (\Exception $e) {
      DB::rollback();

      Log::error($e->getMessage(), [
        "func_name" => $funcName,
        'user' => Auth::user()
      ]);
      return Response::buildErrorService($e->getMessage());
    }

    return $return;
  }

  public function delete(int $id): array
  {
    $return = [];
    $funcName = $this->className . ".delete";

    DB::beginTransaction();

    try {
      $delete = DB::table(DatabaseEntity::PRODUCT)
        ->where('id', $id)
        ->update([
          'deleted_by' => Auth::user()->id,
          'deleted_at' => datetime_now(),
        ]);

      if (!$delete) {
        DB::rollback();

        throw new Exception("FAILED DELETE DATA");
      }

      DB::commit();

      $return = Response::buildSuccess();
    } catch (\Exception $e) {
      DB::rollback();
      Log::error($e->getMessage(), [
        "func_name" => $funcName,
        'user' => Auth::user()
      ]);

      return Response::buildErrorService($e->getMessage());
    }

    return $return;
  }
}
