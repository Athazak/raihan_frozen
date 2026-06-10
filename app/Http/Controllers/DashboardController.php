<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
    public function index(Request $request)
    {
        /*
    /*
|--------------------------------------------------------------------------
| Statistik Dashboard
|--------------------------------------------------------------------------
*/

        // Total seluruh barang
        $totalBarang = Product::count();

        // Total kategori
        $totalKategori = Category::count();

        /*
|--------------------------------------------------------------------------
| Stok Menipis
|--------------------------------------------------------------------------
| Hanya barang yang stoknya kurang dari minimum
| tetapi tidak termasuk stok habis
|--------------------------------------------------------------------------
*/
        $stokMenipis = Product::whereColumn(
            'stock',
            '<',
            'minimum_stock'
        )
            ->where('stock', '>', 0)
            ->count();

        /*
|--------------------------------------------------------------------------
| Stok Habis
|--------------------------------------------------------------------------
*/
        $stokHabis = Product::where(
            'stock',
            0
        )->count();
        /*
    |--------------------------------------------------------------------------
    | Query Barang
    |--------------------------------------------------------------------------
    */

        $products = Product::with('category');

        /*
    |--------------------------------------------------------------------------
    | Search Nama Barang
    |--------------------------------------------------------------------------
    */
        if ($request->filled('search')) {
            $products->where(
                'name',
                'like',
                '%' . $request->search . '%'
            );
        }

        /*
    |--------------------------------------------------------------------------
    | Filter Kategori
    |--------------------------------------------------------------------------
    */
        if ($request->filled('category')) {
            $products->where(
                'category_id',
                $request->category
            );
        }

        /*
    |--------------------------------------------------------------------------
    | Ambil hasil
    |--------------------------------------------------------------------------
    */
        $products = $products
            ->latest()
            ->get();

        /*
    |--------------------------------------------------------------------------
    | Ambil kategori untuk dropdown
    |--------------------------------------------------------------------------
    */
        $categories = Category::all();

        return view(
            'dashboard',
            compact(
                'products',
                'categories',
                'totalBarang',
                'totalKategori',
                'stokMenipis',
                'stokHabis'
            )
        );
    }
}
