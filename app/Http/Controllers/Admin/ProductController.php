<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.products.index', compact('products'));
    }

    public function create(): View
    {
        $categories = Category::where('type', 'product')->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_featured' => 'nullable|boolean',
        ]);

        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        // FIX CHECKBOX PRODUK UNGGULAN
        $data['is_featured'] = $request->input('is_featured', 0);

        // UPLOAD GAMBAR
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = 'product_' . time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('public/products', $filename);

            $data['image'] = $filename;
        }

        Product::create($data);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id): View
    {
        $product = Product::findOrFail($id);

        $categories = Category::where('type', 'product')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_featured' => 'nullable|boolean',
        ]);

        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        // FIX CHECKBOX PRODUK UNGGULAN
        $data['is_featured'] = $request->input('is_featured', 0);

        // UPDATE GAMBAR
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = 'product_' . time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('public/products', $filename);

            $data['image'] = $filename;
        }

        $product->update($data);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);

        return view('admin.products.show', compact('product'));
    }
}