<?php

class AdminIndexPageController extends BaseController {



	public function showIndexPageEditor()
	{

            if (!Session::has('user')) {
                return Redirect::to('ListDeedAdmin');
            }
            $records = Montage::all();
            $records_two = BottomMontage::all();
           

            if(Session::has('per_page'))
            {
               
                $paginate=Session::get('per_page');
            }
            else{
               
                $paginate=5;
                
            }
            if(Session::has('per_page_two'))
            {
               
                $paginate_two=Session::get('per_page_two');
            }
            else{
               
                $paginate_two=5;
                
            }

           
            $current_page = max(1, Input::get('page'));
            $start = (($current_page - 1) * $paginate ) + 1;
            $end = $start + $paginate-1;
            $total = Montage::count();
            $i = (($current_page - 1) * $paginate );
           if($end > count($records)){

                $end = count($records);
            }

            $current_page_two = max(1, Input::get('page'));
            $start_two = (($current_page_two - 1) * $paginate_two ) + 1;
            $end_two = $start_two + $paginate_two-1;
            $total_two = BottomMontage::count();
            $i_two = (($current_page_two - 1) * $paginate_two );
           if($end_two > count($records_two)){

                $end_two = count($records_two);
            }

            $Business = CoreBusiness::all();
            $CorporateInformation = CorporateInformation::all();
            $montages = Montage::paginate($paginate);
            $BottomMontages = BottomMontage::paginate($paginate_two);

            $page = Page::find(1);
            $user = Session::get('user');

        
           
         return View::make('admin.index_edit')
                    ->with('user', $user)
                    ->with('businesses_create', $Business)
                    ->with('corporate_information_create', $CorporateInformation)
                    ->with('montages', $montages)
                    ->with('BottomMontages', $BottomMontages)
                    ->with('page', $page)
                    ->with('start',$start)
                    ->with('end',$end)
                    ->with('total',$total)
                    ->with("incr",$i)
                    ->with('start_two',$start_two)
                    ->with('end_two',$end_two)
                    ->with('total_two',$total_two)
                    ->with("incr_two",$i_two);
                }

    public function delete_by_selection(){
          $del=Input::get('del');
         $input=explode(",",$del[0]);      
          Montage::destroy($input);
         return Redirect::back()->with('message','Selected Item Deleted Successfully');
                 
    }

    public function delete_BottomMontage_by_selection(){
           $del=Input::get('del');
         $input=explode(",",$del[0]);        
        $del=BottomMontage::destroy($input);
     
        return Redirect::back()->with('message','Selected Item Deleted Successfully');
                
   }


    public function set_paginate(){
        $id=Input::get('id');
        Session::put('per_page',$id);

       
       return Redirect::back();
    }
    public function set_paginate_two(){
        $id=Input::get('id');
        Session::put('per_page_two',$id);

       
       return Redirect::back();
    }

}
