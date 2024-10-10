<?php

namespace App\Http\Controllers\admin;

use App\Entities\ResponseEntity;
use App\Http\Controllers\Controller;
use App\Usecases\ProductCategoryUsecase;
use App\Usecases\ProductUsecase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $usecase;
    protected $productCategoryUsecase;
    protected $page = [
        "route" => "product",
        "title" => "Produk",
    ];
    protected $baseRedirect;

    public function __construct(
        ProductUsecase $usecase,
        ProductCategoryUsecase $productCategoryUsecase,
    ) {
        $this->usecase = $usecase;
        $this->productCategoryUsecase = $productCategoryUsecase;
        $this->baseRedirect = "admin/" . $this->page['route'];
    }

    public function index(Request $req): View
    {
        $data = $this->usecase->getAll($req->input());
        $productCategories = $this->productCategoryUsecase->getAll();
        $productCategories = $productCategories['data']['list'] ?? [];

        return view("_admin.product.list", [
            'data' => $data['data']['list'] ?? [],
            'page' => $this->page,
            'productCategories' => $productCategories,
            'filter' => $req->input(),
        ]);
    }

    public function add(): View
    {
        $productCategories = $this->productCategoryUsecase->getAll();
        $productCategories = $productCategories['data']['list'] ?? [];

        return view("_admin.product.add", [
            'page' => $this->page,
            'productCategories' => $productCategories,
        ]);
    }

    public function doCreate(Request $request): RedirectResponse
    {
        $createProcess = $this->usecase->create(
            data: $request,
        );

        if (empty($createProcess['error'])) {
            return redirect()
                ->intended($this->baseRedirect)
                ->with('success', $createProcess['message']);
        } else {
            return redirect()
                ->intended($this->baseRedirect)
                ->with('error', ResponseEntity::DEFAULT_ERROR_MESSAGE);
        }
    }

    public function update(int $id): View|RedirectResponse
    {
        $data = $this->usecase->getByID($id);

        if (empty($data['data'])) {
            return redirect()
                ->intended($this->baseRedirect)
                ->with('error', ResponseEntity::DEFAULT_ERROR_MESSAGE);
        }
        $data = $data['data'] ?? [];
        $productCategories = $this->productCategoryUsecase->getAll();
        $productCategories = $productCategories['data']['list'] ?? [];

        return view("_admin.product.update", [
            'data' => (object) $data,
            'page' => $this->page,
            'productCategories' => $productCategories,
        ]);
    }

    public function doUpdate(int $id, Request $request): RedirectResponse
    {
        $createProcess = $this->usecase->update(
            data: $request,
            id: $id,
        );

        if (empty($createProcess['error'])) {
            return redirect()
                ->intended($this->baseRedirect)
                ->with('success', ResponseEntity::SUCCESS_MESSAGE_UPDATED);
        } else {
            return redirect()
                ->intended($this->baseRedirect)
                ->with('error', ResponseEntity::DEFAULT_ERROR_MESSAGE);
        }
    }

    public function doDelete(int $id, Request $request): RedirectResponse
    {
        $createProcess = $this->usecase->delete(
            id: $id,
        );

        if (empty($createProcess['error'])) {
            return redirect()
                ->intended($this->baseRedirect)
                ->with('success', ResponseEntity::SUCCESS_MESSAGE_DELETED);
        } else {
            return redirect()
                ->intended($this->baseRedirect)
                ->with('error', ResponseEntity::DEFAULT_ERROR_MESSAGE);
        }
    }

    public function detail(int $id): View|RedirectResponse
    {
        $data = $this->usecase->getDetailByID($id);

        if (empty($data['data'])) {
            return redirect()
                ->intended($this->baseRedirect)
                ->with('error', ResponseEntity::DEFAULT_ERROR_MESSAGE);
        }
        $data = $data['data'] ?? [];

        return view("_admin.product.detail", [
            'data' => (object) $data,
            'page' => $this->page,
        ]);
    }
}
