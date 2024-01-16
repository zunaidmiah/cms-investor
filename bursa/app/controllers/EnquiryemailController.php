<?php

class EnquiryemailController extends BaseController {

    public function listing() {
        $pgCount = Enquiryemail::count();
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



       // $emails = Enquiryemail::orderBy('updated_at', 'DESC')->paginate($noperpage);
		$emails = Enquiryemail::join('enquiry_category', 'enquiry_category.parent_id', '=', 'enquiry_email.cat_id')
			->orderBy('enquiry_email.updated_at', 'DESC')
			->paginate($noperpage);
 
 //print_r($emails[0]->updated_at->toDateTimeString());exit;
//        print "<pre>";
//        print_r($emails[0]->category->scat);
//        die("here");
        $categories_arr = array('' => '--Please Select--');
        $subcategories_arr = array('' => '--Please Select--');
        $cats = Enquirycategory::where('parent_id', '=', 0)->where('active', 1)->lists('title', 'id');
        foreach ($cats as $key => $val) {
            $categories_arr[$key] = $val;
        }
        return View::make('admin.enquiryemail', array(
                    'emails' => $emails,
                    'cntarray1' => $cntarray1,
                    'categories_arr' => $categories_arr,
                    'subcategories_arr' => $subcategories_arr
                        )
        );
    }

    public function addEnquiryemail() {
        //dd(Input::all());
        $email = Enquiryemail::create(Input::all());
        if ($email) {
            return Redirect::back()->with('message', '<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Enquiry email Added Successfully.</p>
              </div>');
        } else {
            return Redirect::back()->with('message', '<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Something happened try again.</p>
              </div>');
        }
    }

    public function deleteEnquiryemail() {
        $id = Input::get('emailid');
        $email = Enquiryemail::findOrFail($id);
        $email->delete();
        if ($email) {
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

    public function editEnquiryemail() {
        $email_id = Input::get('emailid');
        $email = Enquiryemail::find($email_id);

        $email->name = Input::get('name');
        $email->email = Input::get('email');
        $email->cat_id = Input::get('cat_id');
        $email->subcat_id = Input::get('subcat_id');

        if ($email->save()) {

            return Redirect::back()->with('message', '<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Enquiry Email Edited Successfully.</p>
              </div>');
        } else {
            return Redirect::back()->with('message', '<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Something happened try again.</p>
              </div>');
        }
    }
    
    public function getSubcategory($id) {
        $sub_categories = Enquirycategory::where('parent_id', $id)->lists('title', 'id');
        ?>
        <option value=''>--Please Select--</option>
        <?php
        foreach ($sub_categories as $key => $val) {
            ?>
            <option value='<?php echo $key; ?>'><?php echo $val ?></option>
            <?php
        }
    }
    

}
