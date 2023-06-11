<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = Member::when($request->filled('search'),function($query) use($request){
            $query->where('name','LIKE','%'.$request->search.'%');
        })->get();
        return view('home')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'phone' => ['required', 'string', 'regex:/^(\+?880|0)1[3-9]\d{8}$/'],
            'detail' => 'nullable',
            'image' => 'nullable|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        Member::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'detail'=> $request->detail,
            'payment'=> 20,
            'image'=> $request->image->store('member')
        ]);
        
        return redirect('/')->with('success','Member has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'required',
            'detail' => 'nullable',
            'image' => 'nullable|mimes:jpeg,png,jpg|max:2048'
        ]);
        if($request->hasFile('image')){
 
            $member->update([
                'image'=> $request->image->store('member')
            ]);
        }

        $member->update([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'detail'=> $request->detail,
            'payment'=> $request->payment,
        ]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect('/');
    }
}
