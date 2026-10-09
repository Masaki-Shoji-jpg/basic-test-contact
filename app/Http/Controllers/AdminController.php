<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Contact;
use App\Models\Category;
class AdminController extends Controller
{
    public function index(ContactRequest $request)
    {
    $contacts = Contact::with(['category', 'tags'])
        ->filter($request->validated())
        ->latest()
        ->paginate(7)
        ->appends($request->query());
    $categories = Category::all();
    $tags = Tag::all();

    return view('admin.index', compact('contacts', 'categories', 'tags'));
    }

    public function show(Contact $contact){
        $contact->load(['category','tags']);
        return view('admin.show',compact('contacat'));
    }

    public function destroy(Contact $contact){
        $contact->delete();
        return redirect('/admin')->with('success','お問い合わせを削除しました');
    }
}
