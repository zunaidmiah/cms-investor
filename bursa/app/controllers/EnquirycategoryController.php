<?php

class EnquirycategoryController extends BaseController {
    /*
      |--------------------------------------------------------------------------
      | Default Career Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function listing() {
        $pgCount = Enquirycategory::where('parent_id', '=', 0)->count();
        $sub_pgCount = Enquirycategory::where('parent_id', '=!', 0)->count();
        for ($i = 1; $i <= $pgCount; $i++) {
            if ($i == 1) {
                $cntArr[10] = 10;
            }

            if ($i == 11) {
                $cntArr[20] = 20;
            }

            if ($i == 21) {
                $cntArr[30] = 30;
            }

            if ($i == 31) {
                $cntArr[50] = 50;
            }

            if ($i == 51) {
                $cntArr[100] = 100;
                //exit;
            }
        }
        if (Input::get('noperpage1')) {
            $noperpage = Input::get('noperpage1');
        } else {

            $noperpage = 10;
        }
        /* End of Paginate Count Section */

        if ($pgCount > 0) {
            $cntarray1 = $cntArr;
        } else {
            $cntarray1 = 0;
        }

        for ($i = 1; $i <= $sub_pgCount; $i++) {
            if ($i == 1) {
                $sub_cntArr[10] = 10;
            }

            if ($i == 11) {
                $sub_cntArr[20] = 20;
            }

            if ($i == 21) {
                $sub_cntArr[30] = 30;
            }

            if ($i == 31) {
                $sub_cntArr[50] = 50;
            }

            if ($i == 51) {
                $sub_cntArr[100] = 100;
                //exit;
            }
        }
        if (Input::get('sub_noperpage1')) {
            $sub_noperpage = Input::get('sub_noperpage1');
        } else {

            $sub_noperpage = 10;
        }
        /* End of Paginate Count Section */

        if ($sub_pgCount > 0) {
            $sub_cntarray1 = $sub_cntArr;
        } else {
            $sub_cntarray1 = 0;
        }

        $categories = Enquirycategory::orderBy('updated_at', 'DESC')->where('parent_id', 0)->paginate($noperpage);
        $sub_categories = Enquirycategory::with('parent_category')->orderBy('updated_at', 'DESC')->where('parent_id', '!=', 0)->paginate($sub_noperpage);
        $categories_arr = array('' => '--Please Select--');
        $cats = Enquirycategory::where('parent_id', '=', 0)->where('active', 1)->lists('title', 'id');
        foreach ($cats as $key => $val) {
            $categories_arr[$key] = $val;
        }
        return View::make('admin.enquirycategory', array(
                    'categories' => $categories,
                    'sub_categories' => $sub_categories,
                    'cntarray1' => $cntarray1,
                    'sub_cntarray1' => $sub_cntarray1,
                    'categories_arr' => $categories_arr,
                        )
        );
    }

    public function addEnquirycategory() {
        //dd(Input::all());
        $category = Enquirycategory::create(Input::all());
        if ($category) {
            return Redirect::back()->with('message', '<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Enquiry Category Added Successfully.</p>
              </div>');
        } else {
            return Redirect::back()->with('message', '<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Something happened try again.</p>
              </div>');
        }
    }

    public function addEnquirysubcategory() {
        //dd(Input::all());
        $category = Enquirycategory::create(Input::all());
        if ($category) {
            return Redirect::back()->with('message', '<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Enquiry Subcategory Added Successfully.</p>
              </div>');
        } else {
            return Redirect::back()->with('message', '<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Something happened try again.</p>
              </div>');
        }
    }

    public function deleteEnquirycategory() {
        $id = Input::get('categoryid');
        $category = Enquirycategory::findOrFail($id);
        $category->delete();
        if ($category) {
            return Redirect::back()->with('message', '<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Deleted Successfully.</p>
              </div>');
        } else {
            return Redirect::back()->with('message', '<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>failed!</strong>
                <p>Something happened try again.</p>
              </div>');
        }
    }

    public function deleteEnquirysubcategory() {
        $id = Input::get('subcategoryid');
        $category = Enquirycategory::findOrFail($id);
        $category->delete();
        if ($category) {
            return Redirect::back()->with('message', '<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Deleted Successfully.</p>
              </div>');
        } else {
            return Redirect::back()->with('message', '<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>failed!</strong>
                <p>Something happened try again.</p>
              </div>');
        }
    }

    public function editEnquirycategory() {
        $category_id = Input::get('categoryid');
        $category = Enquirycategory::find($category_id);

        $category->title = Input::get('title');
        $category->active = Input::get('active');

        if ($category->save()) {

            return Redirect::back()->with('message', '<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Category Edited Successfully.</p>
              </div>');
        } else {
            return Redirect::back()->with('message', '<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Something happened try again.</p>
              </div>');
        }
    }

    public function editEnquirysubcategory() {
        $category_id = Input::get('subcategoryid');
        $category = Enquirycategory::find($category_id);

        $category->title = Input::get('title');
        $category->parent_id = Input::get('parent_id');
        $category->active = Input::get('active');

        if ($category->save()) {

            return Redirect::back()->with('message', '<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>SubCategory Edited Successfully.</p>
              </div>');
        } else {
            return Redirect::back()->with('message', '<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Something happened try again.</p>
              </div>');
        }
    }

}
