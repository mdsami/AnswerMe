<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Dessert;
use App\Dessertsize;
use App\Addon;
use App\Cake;
use App\Sauce;
use Flashy;
use Validator;
use Exception;

class DessertsController extends Controller
{

    private $rules = [

    ];
    private $messages = [

    ];
    //
    public function index () {
      $Dessert = Dessert::paginate(10);;
      return view('desserts.index', compact('Dessert'));
    }
    
    
    
    public function desertProfile($id){
      $desert=Dessert::find($id);
    $desertSizes=DB::select('SELECT * from dessertSizes where dessertSizes.desserts_id=?',[$id]);
      
      return view('desserts.profile',['desert'=>$desert,'desertSizes'=>$desertSizes]);
    }
    
    
    public function desertsSizeAdd($id){
        return view('desserts.desertsSizeAdd',['id'=>$id]);
    }
    
    public function desertsSizeinsert(Request $request, $id){
      $this->validate($request, [
      'description_ar'=>'required|min:5',
      'description_en'=>'required|min:5',
      'image'=>'required|image',
      'price'=>'required|integer',
      'cock_time'=>'required|integer',
    ]);
        
        
        $file=$request->image;
    $ad_photo = str_random(30) . '.' . $file->getClientOriginalExtension();
    $file->move( public_path('uploades/desertsSize') , $ad_photo);
    $url=Request()->root().'/uploades/desertsSize/'.$ad_photo;      
        
        $Dessertsize=new Dessertsize();
        $Dessertsize->description_ar=$request->description_ar;
        $Dessertsize->description_en=$request->description_en;
        $Dessertsize->image=$url;
        $Dessertsize->price=$request->price;
        $Dessertsize->cock_time=$request->cock_time;
        $Dessertsize->desserts_id=$id;
    
        
           $handel=$Dessertsize->save();
        $msgSuccess = "تمت اضافة الحلوى بنجاح";
        $msgFailure = "عذرا! لم يتم اضافة الحلوى";
        Flashy::success($handel == 1 ? $msgSuccess : $msgFailure);

        // Data to Return
        return redirect('/desserts/profile/'.$id);
        
        
    }
    
    public function desertsSizeedit($id){
           $Dessertsize=Dessertsize::find($id);
               return view('desserts.desertsSizeedit',['Dessertsize'=>$Dessertsize]);
    }
    
    public function desertsSizeupdate(Request $request,$id){
        $this->validate($request, [
      'description_ar'=>'required|min:5',
      'description_en'=>'required|min:5',
  
      'price'=>'required|integer',
      'cock_time'=>'required|integer',
    ]);
        
        if($request->file('image') == true){
        $file=$request->image;
    $ad_photo = str_random(30) . '.' . $file->getClientOriginalExtension();
    $file->move( public_path('uploades/desertsSize') , $ad_photo);
    $url=Request()->root().'/uploades/desertsSize/'.$ad_photo;      
        }
        $Dessertsize=Dessertsize::find($id);
        $Dessertsize->description_ar=$request->description_ar;
        $Dessertsize->description_en=$request->description_en;
        if($request->file('image') == true)
        $Dessertsize->image=$url;
        $Dessertsize->price=$request->price;
        $Dessertsize->cock_time=$request->cock_time;
     
    
        
           $handel=$Dessertsize->save();
        $msgSuccess = "تمت تعديل الحلوى بنجاح";
        $msgFailure = "عذرا! لم يتم اضافة الحلوى";
        Flashy::success($handel == 1 ? $msgSuccess : $msgFailure);

        // Data to Return
        return redirect('/desserts');
    }
    
    
    public function desertSizeDelete($id){
        $Dessertsize=Dessertsize::find($id);
         $handel=$Dessertsize->delete();
        $msgSuccess = "تمت حذف الحلوى بنجاح";
        $msgFailure = "عذرا! لم يتم اضافة الحلوى";
        Flashy::success($handel == 1 ? $msgSuccess : $msgFailure);

        // Data to Return
        return redirect('/desserts');
    }

    public function dessertAdd () {
      return view('desserts.add');
    }

    public function dessertCreate (Request $request) {

        $rules = [
            'name_ar' =>'required',
            'name_en' =>'required',
            'dessertSizes_id' =>'required',
            
            'description_ar' =>'required',
            'description_en' =>'required',
            'price' =>'required',
            'cock_time' =>'required',
            'image' =>'required'
        ];
        $messages = [
            'required'  =>'لا بد من ادخال هذا الحقل'
        ];

        //Validate
        $errors = Validator::make($request->all(), $rules, $messages);
        if($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withInput($request->all());
        }
      
        $file=$request->image;
        $ad_photo = str_random(30) . '.' . $file->getClientOriginalExtension();
    $file->move( public_path('deserts/') , $ad_photo);
    $url=Request()->root().'/deserts/'.$ad_photo;

        // Create New Dessert Record
        $Dessert = new Dessert;
        $Dessert->name_ar = $request->name_ar;
        $Dessert->name_en = $request->name_en;
        $handel = $Dessert->save();

        // Create New Dessert Record
        $Dessertsize = new Dessertsize;
        $Dessertsize->desserts_id =$Dessert->id;
        $Dessertsize->description_ar = $request->description_ar;
        $Dessertsize->description_en = $request->description_en;
        $Dessertsize->image = $url;
        $Dessertsize->price = $request->price;
        $Dessertsize->cock_time = $request->cock_time;
        $handel = $Dessertsize->save();
       
        $Dessert->dessertSizes_id = $Dessertsize->id;
        $handel=$Dessert->save();
        $msgSuccess = "تمت اضافة الحلوى بنجاح";
        $msgFailure = "عذرا! لم يتم اضافة الحلوى";
        Flashy::success($handel == 1 ? $msgSuccess : $msgFailure);

        // Data to Return
        return redirect('/desserts');
    }

     public function dessertEdit ($id) {
        $Dessert = Dessert::find($id);
        return view('desserts.edit', compact('Dessert'));
    }

    public function dessertUpdate(Request $request){
        $rules = [
            'name_ar' =>'required',
            'name_en' =>'required'
        ];
        $messages = [
            'required'  =>'لا بد من ادخال هذا الحقل'
        ];
        //Validate
        $errors = Validator::make($request->all(), $this->rules, $this->messages);
            if($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withInput($request->all());
        }
   
        // Update Record
        $Dessert = Dessert::find($request->id);
        $Dessert->name_ar = $request->name_ar;
        $Dessert->name_en = $request->name_en;
        $handel = $Dessert->save();
        $msgSuccess = "تم التعدي بنجاح";
        $msgFailure = "عذرا! لم يتم التعدي";
        Flashy::success($handel == 1 ? $msgSuccess : $msgFailure);
        // Data to Return
        return redirect('/desserts');
    }


    public function dessertDestroy ($id) {
           $Dessert = false;
        try {
             $Dessert = Dessert::destroy($id);
        } catch (Exception $e) {
            $msgFailure = "لا يمكن الحذف  ... توجد بيانات مرتبطة بهذا الحقل.";
            Flashy::success($msgFailure);
            return redirect()->route('desserts');
        }
       
        $msgSuccess = " تمت عملية الحذف بنجاح ";
        $msgFailure = " لا يمكن حذف هذا الحقل ";
        Flashy::success($Dessert == true ? $msgSuccess : $msgFailure);
        return redirect()->route('desserts');
    }

    public function dessertExtra () {
      $Addon = Addon::all();
    $Cake = Cake::all();
      $Sauce = Sauce::all();
      return view('desserts.extra', compact('Addon', 'Cake', 'Sauce'));
    }


    //Addon Operation
    public function addonAdd () {
        return view('desserts.addextra');
    }

    public function addonCreate(Request $request){
        $rules = [
            'name_ar' =>'required',
            'name_en' =>'required',
            'price' =>'required',
            'cock_time' =>'required'
        ];
        $messages = [
            'required'  =>'لا بد من ادخال هذا الحقل'
        ];

        //Validate
        $errors = Validator::make($request->all(), $rules, $messages);
        if($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withInput($request->all());
        }

        // Create Record
        $Addon = new Addon;
        $Addon->name_ar = $request->name_ar;
        $Addon->name_en = $request->name_en;
        $Addon->price = $request->price;
        $Addon->cock_time = $request->cock_time;
        $handel = $Addon->save();

        $msgSuccess = "تمت اضافة الاضافة بنجاح ";
        $msgFailure = "عذرا! لم يتم اضافة الاضافة";
        Flashy::success($handel == 1 ? $msgSuccess : $msgFailure);
        $Addon = Addon::all();
        $Cake = Cake::all();
        $Sauce = Sauce::all();
        return view('desserts.extra', compact('Addon', 'Cake', 'Sauce'));
    }

    public function addonEdit ($id) {
        $Extra = Addon::find($id);
        return view('desserts.editextra', compact('Extra'));
    }

    public function addonUpdate(Request $request){
        $rules = [
            'name_ar' =>'required',
            'name_en' =>'required',
            'price' =>'required',
            'cock_time' =>'required'
        ];
        $messages = [
            'required'  =>'لا بد من ادخال هذا الحقل'
        ];
        //Validate
        $errors = Validator::make($request->all(), $this->rules, $this->messages);
            if($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withInput($request->all());
        }
   
        // Update Record
        $Addon = Addon::find($request->id);
        $Addon->name_ar = $request->name_ar;
        $Addon->name_en = $request->name_en;
        $Addon->price = $request->price;
        $Addon->cock_time = $request->cock_time;
        $handel = $Addon->save();
        $msgSuccess = "تم تعديل الاضافة بنجاح";
        $msgFailure = "عذرا! لم يتم تعديل الاضافة";
        Flashy::success($handel == 1 ? $msgSuccess : $msgFailure);
        $Addon = Addon::all();
        $Cake = Cake::all();
        $Sauce = Sauce::all();
        return view('desserts.extra', compact('Addon', 'Cake', 'Sauce'));
    } 

    public function addonDestroy ($id) {
        $Extra = false;
        try {
             $Extra = Addon::destroy($id);
        } catch (Exception $e) {
            $msgFailure = "لا يمكن الحذف  ... توجد بيانات مرتبطة بهذا الحقل.";
            Flashy::success($msgFailure);
            return redirect()->route('dessertExtra');
        }
       
        $msgSuccess = " تمت عملية الحذف بنجاح ";
        $msgFailure = " لا يمكن حذف هذا الحقل ";
        Flashy::success($Extra == true ? $msgSuccess : $msgFailure);
        return redirect()->route('dessertExtra');
    }

    //cake Operation
    public function cakeAdd () {
        return view('desserts.addextra');
    }

    public function cakeCreate(Request $request){
        $rules = [
            'name_ar' =>'required',
            'name_en' =>'required',
            'price' =>'required',
            'cock_time' =>'required'
        ];
        $messages = [
            'required'  =>'لا بد من ادخال هذا الحقل'
        ];

        //Validate
        $errors = Validator::make($request->all(), $rules, $messages);
        if($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withInput($request->all());
        }

        // Create Record
        $Cake = new Cake;
        $Cake->name_ar = $request->name_ar;
        $Cake->name_en = $request->name_en;
        $Cake->price = $request->price;
        $Cake->cock_time = $request->cock_time;
        $handel = $Cake->save();

        $msgSuccess = "تمت اضافة الكيكة بنجاح ";
        $msgFailure = "عذرا! لم يتم اضافة الكيكة";
        Flashy::success($handel == 1 ? $msgSuccess : $msgFailure);
        $Addon = Addon::all();
        $Cake = Cake::all();
        $Sauce = Sauce::all();
        return view('desserts.extra', compact('Addon', 'Cake', 'Sauce'));
    }

    public function cakeEdit ($id) {
        $Extra = Cake::find($id);
        return view('desserts.editextra', compact('Extra'));
    }
    
    public function cakeUpdate(Request $request){
        $rules = [
            'name_ar' =>'required',
            'name_en' =>'required',
            'price' =>'required',
            'cock_time' =>'required'
        ];
        $messages = [
            'required'  =>'لا بد من ادخال هذا الحقل'
        ];
        //Validate
        $errors = Validator::make($request->all(), $this->rules, $this->messages);
            if($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withInput($request->all());
        }
   
        // Update Record
        $Cake = Cake::find($request->id);
        $Cake->name_ar = $request->name_ar;
        $Cake->name_en = $request->name_en;
        $Cake->price = $request->price;
        $Cake->cock_time = $request->cock_time;
        $handel = $Cake->save();
        $msgSuccess = "تم تعديل الاضافة بنجاح";
        $msgFailure = "عذرا! لم يتم تعديل الاضافة";
        Flashy::success($handel == 1 ? $msgSuccess : $msgFailure);
        $Addon = Addon::all();
        $Cake = Cake::all();
        $Sauce = Sauce::all();
        return view('desserts.extra', compact('Addon', 'Cake', 'Sauce'));
    } 

    public function cakeDestroy ($id) {
        $Extra = false;
        try {
             $Extra = Cake::destroy($id);
        } catch (Exception $e) {
            $msgFailure = "لا يمكن الحذف  ... توجد بيانات مرتبطة بهذا الحقل.";
            Flashy::success($msgFailure);
            return redirect()->route('dessertExtra');
        }
       
        $msgSuccess = " تمت عملية الحذف بنجاح ";
        $msgFailure = " لا يمكن حذف هذا الحقل ";
        Flashy::success($Extra == true ? $msgSuccess : $msgFailure);
        return redirect()->route('dessertExtra');
    }

    //sauce Operation
    public function sauceAdd () {
        return view('desserts.addextra');
    }

    public function sauceCreate(Request $request){
        $rules = [
            'name_ar' =>'required',
            'name_en' =>'required',
            'price' =>'required',
            'cock_time' =>'required'
        ];
        $messages = [
            'required'  =>'لا بد من ادخال هذا الحقل'
        ];

        //Validate
        $errors = Validator::make($request->all(), $rules, $messages);
        if($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withInput($request->all());
        }

        // Create Record
        $Sauce = new Sauce;
        $Sauce->name_ar = $request->name_ar;
        $Sauce->name_en = $request->name_en;
        $Sauce->price = $request->price;
        $Sauce->cock_time = $request->cock_time;
        $handel = $Sauce->save();

        $msgSuccess = "تمت اضافة الصوص بنجاح ";
        $msgFailure = "عذرا! لم يتم اضافة الصوص";
        Flashy::success($handel == 1 ? $msgSuccess : $msgFailure);
        $Addon = Addon::all();
        $Cake = Cake::all();
        $Sauce = Sauce::all();
        return view('desserts.extra', compact('Addon', 'Cake', 'Sauce'));
    }

    public function sauceEdit ($id) {
        $Extra = Sauce::find($id);
        return view('desserts.editextra', compact('Extra'));
    }
    
    public function sauceUpdate(Request $request){
        $rules = [
            'name_ar' =>'required',
            'name_en' =>'required',
            'price' =>'required',
            'cock_time' =>'required'
        ];
        $messages = [
            'required'  =>'لا بد من ادخال هذا الحقل'
        ];
        //Validate
        $errors = Validator::make($request->all(), $this->rules, $this->messages);
            if($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withInput($request->all());
        }
   
        // Update Record
        $Sauce = Sauce::find($request->id);
        $Sauce->name_ar = $request->name_ar;
        $Sauce->name_en = $request->name_en;
        $Sauce->price = $request->price;
        $Sauce->cock_time = $request->cock_time;
        $handel = $Sauce->save();
        $msgSuccess = "تم تعديل الصوص بنجاح";
        $msgFailure = "عذرا! لم يتم تعديل الصوص";
        Flashy::success($handel == 1 ? $msgSuccess : $msgFailure);
        $Addon = Addon::all();
        $Cake = Cake::all();
        $Sauce = Sauce::all();
        return view('desserts.extra', compact('Addon', 'Cake', 'Sauce'));
    }

    public function sauceDestroy ($id) {
        $Extra = false;
        try {
             $Extra = Sauce::destroy($id);
        } catch (Exception $e) {
            $msgFailure = "لا يمكن الحذف  ... توجد بيانات مرتبطة بهذا الحقل.";
            Flashy::success($msgFailure);
            return redirect()->route('dessertExtra');
        }
       
        $msgSuccess = " تمت عملية الحذف بنجاح ";
        $msgFailure = " لا يمكن حذف هذا الحقل ";
        Flashy::success($Extra == true ? $msgSuccess : $msgFailure);
        return redirect()->route('dessertExtra');
    } 
}
