<?php

namespace PhoneBook\Http\Controllers;

use PhoneBook\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Book::orderBy('id', 'DESC')->get();
        return view('dashboard', compact('contacts'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'document' => 'required|unique:books|max:11',
            'email' => 'required|unique:books|max:255|email',
            'phone' => 'required|digits_between:7,10',
        ]);

        if($request->ajax()){
            $contact = new Book($request->all());
            $contact->save();
            return response()->json([
                'success' => 'success',
                'title' => '¡Bien hecho!',
                'message' => 'Datos almacenados correctamente.',
                'status' => '200',
                'data' => $request->all()
            ]);
        }

        $contact = new Book($request->all());
        $contact->save();
        return  redirect('/', 301);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'document' => 'required|max:11',
            'email' => 'required|max:255|email',
            'phone' => 'required|digits_between:7,10',
        ]);

        if($request->ajax()){
            $contact = Book::find($request->id);
            $contact->name = $request->name;
            $contact->document = $request->document;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->save();
            return response()->json([
                'success' => 'success',
                'title' => '¡Bien hecho!',
                'message' => 'Datos actualizados correctamente.',
                'status' => '200',
            ]);
        }

        $contact = Book::find($request->id);
        $contact->name = $request->name;
        $contact->document = $request->document;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->save();
        return  redirect('/', 301);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Request $request)
    {
        if($request->ajax()){
            $contact = Book::find($request->id);
            $contact->forceDelete();
            return response()->json([
                'success' => 'success',
                'title' => '¡Bien hecho!',
                'message' => 'Datos eliminados correctamente.',
                'status' => '200',
            ]);
        }

        $contact = Book::find($request->id);
        $contact->forceDelete();
        return  redirect('/', 301);
    }
}
