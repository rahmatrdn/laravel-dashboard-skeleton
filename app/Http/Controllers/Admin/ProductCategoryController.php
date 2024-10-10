<?php

namespace App\Http\Controllers\admin;

use App\Entities\ResponseEntity;
use App\Http\Controllers\Controller;
use App\Usecases\ProductCategoryUsecase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    protected $usecase;
    protected $page = [
        "route" => "product_category",
        "title" => "Kategori Produk",
    ];
    protected $baseRedirect;

    public function __construct(ProductCategoryUsecase $usecase)
    {
        $this->usecase = $usecase;
        $this->baseRedirect = "admin/" . $this->page['route'];
    }

    public function index(): View
    {
        $data = $this->usecase->getAll();

        return view("_admin.product-category.list", [
            'data' => $data['data']['list'] ?? [],
            'page' => $this->page,
        ]);
    }

    public function add(): View
    {
        return view("_admin.product-category.add", [
            'page' => $this->page,
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

        return view("_admin.product-category.update", [
            'data' => (object) $data,
            'page' => $this->page,
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
}
