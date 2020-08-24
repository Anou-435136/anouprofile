<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\Contacted;
use Illuminate\Http\Request;

class HttpContactController extends Controller
{
  public function input() {
    return view('contact.input');
  }

  public function send(ContactRequest $request) {
    $params = [
      'name' => $request->name,
      'email' => $request->email,
      'question' => $request->question,
      'questionM' => $request->questionM
    ];
    \Mail::to('admin@example.com')->send(new Contacted($params));
  }
}