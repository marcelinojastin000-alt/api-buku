<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return response()->json([
            "status" => true,
            "message" => "Data buku berhasil diambil",
            "data" => Book::all()
        ]);
    }

    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                "status" => false,
                "message" => "Data tidak ditemukan",
                "data" => null
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "Data ditemukan",
            "data" => $book
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "author" => "required",
            "year" => "required|integer|min:1900",
            "stock" => "required|integer|min:0"
        ]);

        $book = Book::create($request->all());

        return response()->json([
            "status" => true,
            "message" => "Data berhasil ditambahkan",
            "data" => $book
        ]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                "status" => false,
                "message" => "Data tidak ditemukan",
                "data" => null
            ]);
        }

        $request->validate([
            "title" => "required",
            "author" => "required",
            "year" => "required|integer|min:1900",
            "stock" => "required|integer|min:0"
        ]);

        $book->update($request->all());

        return response()->json([
            "status" => true,
            "message" => "Data berhasil diupdate",
            "data" => $book
        ]);
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                "status" => false,
                "message" => "Data tidak ditemukan",
                "data" => null
            ]);
        }

        $book->delete();

        return response()->json([
            "status" => true,
            "message" => "Data berhasil dihapus",
            "data" => null
        ]);
    }
}