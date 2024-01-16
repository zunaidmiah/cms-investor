<?php

class PopupController extends \BaseController 
{

	public function index()
    {
        if (!Session::has('user')) {          
            return Redirect::to('ListDeedAdmin');
        }
        $data['pop'] = PopUp::all();
        //$data = [];
        return view::make('admin.popups', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        if (!Session::has('user')) {          
            return Redirect::to('ListDeedAdmin');
        }

        if(Input::hasFile('image')){
            $file=Input::file('image');
            $name = time() . '.'.$file->getClientOriginalName();
            $file->move(
                base_path() . '/public/images/', $name
            );
            PopUp::where(['id'=>1])->update([
                'title'=>Input::get('title'),
                'status'=>Input::get('status')?1:0,
                'image'=> $name
            ]);
        }else{
            PopUp::where(['id'=>1])->update([
                'title'=>Input::get('title'),
                'status'=>Input::get('status')?1:0,
            ]);
        }
        return Redirect::back()->with(['flash_message', 'The data has been updated']);


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
