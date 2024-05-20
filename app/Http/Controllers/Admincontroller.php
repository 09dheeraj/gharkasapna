<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;
use App\Models\Blog;
use App\Models\Category;
use App\Models\properties;
use App\Models\BlogComment;
use Illuminate\Support\Str;
use App\Models\Review_reply;
use App\Models\Likeproperty;
use App\Models\Membership;
use App\Models\Notifications;

class Admincontroller extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }


    // public function view_dashboard()
    // {
    //     $title = 'DASHBOARD | ADMIN';

    //     $totalProperties = properties::count();
    //     $totalusers = User::where('roles', 'user')->count();
    //     $totalvendor = User::where('roles', 'vendor')->count();
    //     $totallikeProperty = FavouriteProperty::count();


    //     return view('Admin.dashboard', compact('title', 'totalProperties', 'totalusers', 'totalvendor', 'totallikeProperty'));
    // }



    // public function view_all_properties(Request $request)
    // {
    //     $title = 'ALL-PROPERTIES | ADMIN';
    //     $properties = properties::orderBy('created_at', 'desc')->paginate(5);
    //     return view('Admin.allproperties', compact('title', 'properties'));
    // }






    // public function search_properties(Request $request)
    // {

    //     $properties = $request->input('search');

    //     $propertiesData = properties::where('property_name', 'like', "%{$properties}%")->paginate(5);

    //     if ($propertiesData) {
    //         return response()->json(['propertiesData' => $propertiesData]);
    //     } else {
    //         return response()->json(['failed' => 'failed']);
    //     }
    // }





    // public function update_property_status(Request $request)
    // {

    //     $selectedValue = $request->input('selectedValue');
    //     $propertyId = $request->input('propertyId');

    //     $vendorProperty = properties::find($propertyId);
    //     if ($vendorProperty) {
    //         $vendorProperty->status = $selectedValue;

    //         $vendorProperty->save();

    //         return response()->json(['message' => 'Vendor staus updated successfully']);
    //     } else {
    //         return response()->json(['message' => 'Vendor property not found'], 404);
    //     }
    // }


    // public function view_all_propertyTyps()
    // {
    //     $title = 'Properties Type | ADMIN';
    //     $Propertytype = Property_type::orderBy('created_at', 'desc')->paginate(10);
    //     return view('Admin.allproperties_type', compact('title', 'Propertytype'));
    // }

    // public function add_properties_type(Request $request)
    // {



    //     $propertyName = $request->input('property_name');
    //     $propertyType = $request->input('property_type');
    //     $propertyImage = null;

    //     if ($request->hasFile('property_image')) {
    //         $image = $request->file('property_image');
    //         if ($image->isValid()) {
    //             $originalExtension = $image->getClientOriginalExtension();
    //             $newExtension = 'webp';
    //             $uniqueName = Str::random(20) . '.' . $newExtension;
    //             $imagePath = public_path('assets/property-type/' . $uniqueName);
    //             $image->move(public_path('assets/property-type/'), $uniqueName);

    //             $propertyImage = $uniqueName;
    //         }
    //     }

    //     $propertyData = Property_type::create([
    //         'name' => $propertyName,
    //         'property_type' => $propertyType,
    //         'propertytype_image' => $propertyImage
    //     ]);

    //     if ($propertyData) {
    //         return redirect()->route('properties.type')->with('success', 'Property type created successfully!');
    //     } else {
    //         return redirect()->route('properties.type')->with('error', 'Failed to create property type.');
    //     }
    // }


    // public function edit_properties_type(Request $request)
    // {
    //     $propertiesID = $request->input('type_id');
    //     $propertiesName = $request->input('property_name');
    //     $propertiesType = $request->input('property_type');

    //     $propertyData = Property_type::find($propertiesID);

    //     $propertyImage = null;

    //     if ($request->hasFile('property_image')) {
    //         $image = $request->file('property_image');
    //         if ($image->isValid()) {
    //             $originalExtension = $image->getClientOriginalExtension();
    //             $newExtension = 'webp';
    //             $uniqueName = Str::random(20) . '.' . $newExtension;
    //             $imagePath = public_path('assets/property-type/' . $uniqueName);
    //             $image->move(public_path('assets/property-type/'), $uniqueName);

    //             $propertyImage = $uniqueName;
    //         }
    //     }

    //     if ($propertyData) {
    //         $propertyData->name = $propertiesName;
    //         $propertyData->property_type = $propertiesType;

    //         if ($propertyImage) {
    //             $propertyData->propertytype_image = $propertyImage;
    //         }

    //         $propertyData->save();

    //         return redirect()->route('properties.type')->with('success', 'Property type updated successfully');
    //     } else {
    //         return redirect()->route('properties.type')->with('error', 'Property type not found');
    //     }
    // }

    // public function deletePropertytype(Request $request)
    // {
    //     $propertyId = $request->input('propertyId');
    //     $property = Property_type::find($propertyId);

    //     if (!$property) {
    //         return response()->json('Property not found', 404);
    //     }
    //     $property->delete();

    //     return response()->json('success', 200);
    // }


    // public function check_properttype(Request $request)
    // {

    //     $propertyName = $request->input('propertyName');

    //     $property = Property_type::where('name', $propertyName)->first();
    //     if (!$property) {
    //         return response()->json('not_exists');
    //     }

    //     return response()->json('exists');
    // }



    // //Blog Details

    // public function view_my_blog(Request $request)
    // {
    //     $title = 'MY BLOG | ADMIN';

    //     $query = Blog::query();

    //     if ($request->filled('search')) {
    //         $query->where(function ($q) use ($request) {
    //             $q->where('blog_name', 'like', '%' . $request->input('search') . '%')
    //                 ->orWhereHas('category', function ($q) use ($request) {
    //                     $q->where('name', 'like', '%' . $request->input('search') . '%');
    //                 });
    //         });
    //     }

    //     $blogs = $query->orderBy('created_at', 'desc')->paginate(5);

    //     return view('Admin.all_bloges', compact('title', 'blogs'));
    // }


    // public function view_add_blog()
    // {

    //     $title = "ADD BLOG | ADMIN";
    //     $categories = Category::orderBy('created_at', 'desc')->get();
    //     return view('Admin.add_bloges', compact('title', 'categories'));
    // }


    // public function view_single_blog_detail($segmentName, $segmentID)
    // {

    //     // $title = ucwords($request->blog_name)."| ADMIN";
    //     $titleWithoutSlug = ucwords($segmentName) . " | ADMIN";
    //     $title = str_replace("-", ' ', $titleWithoutSlug);
    //     $BlogData = Blog::where('id', $segmentID)->first();
    //     $randomblog_DATA = Blog::inRandomOrder()->limit(3)->get();
    //     return view('Admin.single_blog_detail', compact('title', 'BlogData', 'randomblog_DATA'));
    // }


    // public function insert_AddBlog(Request $request)
    // {
    //     $blogStatus = "Pending";
    //     $blogName = Blog::where('blog_name', $request->input('blog_name'))->first();

    //     if ($blogName) {

    //         return redirect()->back()->withErrors(['blog_name' => 'The blog name already exists.']);
    //     }

    //     $blog = new Blog([
    //         'blog_name' => $request->input('blog_name'),
    //         'blog_description' => $request->input('blog_description'),
    //         'meta_title' => $request->input('meta_title'),
    //         'meta_description' => $request->input('meta_description'),
    //         'meta_keywords' => $request->input('meta_keywords'),
    //         'categories' => $request->input('category_id'),
    //         'author_name' => $request->input('author_name'),
    //         'short_description' => $request->input('short_description'),
    //         'status' => $blogStatus,
    //     ]);

    //     if ($request->hasFile('images')) {
    //         $file = $request->file('images');
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = time() . '.' . $extension;
    //         $file->move('uploads/images/', $filename);
    //         $blog->images = $filename;
    //     }

    //     $blog->save();

    //     return redirect()->route('admin.allblog')->with('success', 'Blog created successfully.');
    // }


    // public function addBlog_category(Request $request)
    // {
    //     $categoryName = $request->input('categoryName');



    //     try {
    //         $addCategory = Category::create([
    //             'name' => $categoryName,
    //             'slug' => Str::slug($categoryName),
    //         ]);

    //         if ($addCategory) {
    //             return response()->json([

    //                 'status' => 'success', 'message' => 'Category created successfully.', 'category' => ['id' => $addCategory->id, 'name' => $addCategory->name,],
    //             ], 200);
    //         } else {
    //             return response()->json(['status' => 'failure', 'message' => 'Failed to create category.'], 500);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json(['status' => 'error', 'message' => 'An error occurred while creating the category.', 'error' => $e->getMessage()], 500);
    //     }
    // }

    // public function check_category_exist(Request $request)
    // {

    //     $categoryName = $request->input('categoryNAME');

    //     $checkCategory = Category::where('name', $categoryName)->first();

    //     if ($checkCategory) {
    //         return response()->json(['exists' => true, 'message' => 'Category already exists.'], 200);
    //     } else {
    //         return response()->json(['exists' => false, 'message' => 'Category does not exist.'], 200);
    //     }
    // }


    // public function view_update_blog($blogName, $segmentID)
    // {
    //     $decodedSegmentName = urldecode($blogName);
    //     $decodedSegmentID = urldecode($segmentID);
    //     $title = $decodedSegmentName . "EDIT BLOG | ADMIN";

    //     $categories = Category::orderBy('created_at', 'desc')->get();
    //     $blogDATA = Blog::where('id', $decodedSegmentID)->first();
    //     return view('Admin.edit_blog', compact('title', 'blogDATA', 'categories'));
    // }


    // public function insert_update_data(Request $request)
    // {

    //     $blog_name = $request->input('blog_name');
    //     $author_name = $request->input('author_name');
    //     $meta_title = $request->input('meta_title');
    //     $meta_description = $request->input('meta_description');
    //     $meta_keywords = $request->input('meta_keywords');
    //     $blog_description = $request->input('blog_description');
    //     $short_description = $request->input('short_description');
    //     $categories = $request->input('categories');

    //     $blogID = $request->input('blogID');

    //     $blogData = Blog::find($blogID);

    //     $blogData->blog_name = $blog_name;
    //     $blogData->author_name = $author_name;
    //     $blogData->meta_title = $meta_title;
    //     $blogData->meta_description = $meta_description;
    //     $blogData->meta_keywords = $meta_keywords;
    //     $blogData->blog_description = $blog_description;
    //     $blogData->categories = $categories;
    //     $blogData->short_description = $short_description;

    //     if ($request->hasFile('images')) {
    //         $image = $request->file('images');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('uploads/images'), $imageName);

    //         $blogData->images = $imageName;
    //     }

    //     $blogData->save();


    //     return redirect()->back()->with('success', 'Blog updated successfully !');
    // }

    // public function addBlog_categoryeditpage(Request $request)
    // {

    //     $categoryName = $request->input('categoryName');



    //     try {
    //         $addCategory = Category::create([
    //             'name' => $categoryName,
    //             'slug' => Str::slug($categoryName),
    //         ]);

    //         if ($addCategory) {
    //             return response()->json([

    //                 'status' => 'success', 'message' => 'Category created successfully.', 'category' => ['id' => $addCategory->id, 'name' => $addCategory->name,],
    //             ], 200);
    //         } else {
    //             return response()->json(['status' => 'failure', 'message' => 'Failed to create category.'], 500);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json(['status' => 'error', 'message' => 'An error occurred while creating the category.', 'error' => $e->getMessage()], 500);
    //     }
    // }


    // public function check_category_existeditpage(Request $request)
    // {

    //     $categoryName = $request->input('categoryNAME');

    //     $checkCategory = Category::where('name', $categoryName)->first();

    //     if ($checkCategory) {
    //         return response()->json(['exists' => true, 'message' => 'Category already exists.'], 200);
    //     } else {
    //         return response()->json(['exists' => false, 'message' => 'Category does not exist.'], 200);
    //     }
    // }


    // public function delete_blog(Request $request)
    // {

    //     $blogId = $request->input('blogid');
    //     $blogDATA = Blog::find($blogId);

    //     if (!$blogDATA) {
    //         return response()->json('Property not found', 404);
    //     }
    //     $blogDATA->delete();

    //     return response()->json('success', 200);
    // }


    // public function mange_blog_status(Request $request)
    // {

    //     $selectedValue = $request->input('selectedValue');
    //     $blogID = $request->input('blogID');

    //     $blogDATA = Blog::find($blogID);
    //     if ($blogDATA) {
    //         $blogDATA->status = $selectedValue;

    //         $blogDATA->save();

    //         return response()->json(['message' => 'Blog status updated successfully']);
    //     } else {
    //         return response()->json(['message' => 'Blog status not found'], 404);
    //     }
    // }


    // public function search_blog_detail(Request $request)
    // {

    //     $blogName = $request->input('searchblog');

    //     $blogData = Blog::where('blog_name', 'like', '%' . $blogName . '%')->get();

    //     if ($blogData) {
    //         return response()->json(['blogData' => $blogData]);
    //     } else {
    //         return response()->json(['failed' => 'failed']);
    //     }

    //     print_r($blogData);
    // }


    // -------------------new function ----------------------------------



    public function manage_all_properties()
    {

        $title = "Property Management Admin Dashboard | Ghar Ka Sapna";
        $pagetitle = "Your Properties Portfolio";
        $properties = properties::orderBy('created_at', 'desc')->paginate(25);
        return view('gharkasapna.innerpage.admin_manage_all_properties', compact('title', 'pagetitle', 'properties'));
    }


    public function edit_post_property($ID)
    {

        $title = "Update Your Post Property | Ghar Ka Sapna";
        $propertiesData = properties::where('id', $ID)->first();
        return view('gharkasapna.innerpage.edit_post_property', compact('title', 'propertiesData'));
    }

    public function manage_property_status(Request $request)
    {

        $selectedValue = $request->input('selectedValue');
        $propertyId = $request->input('propertyId');
        $sessionID = session()->get('id');

        $vendorProperty = properties::find($propertyId);


        if ($vendorProperty) {
            $vendorProperty->status = $selectedValue;

            $vendorProperty->save();
            // Update or create a notification
            $vendorID = $vendorProperty->vendor_id;
            $checkNotification = Notifications::where('vendor_id', $vendorID)->where('property_id', $propertyId)->where('user_id', $sessionID)->first();
            if ($checkNotification) {
                $checkNotification->data = $selectedValue;
                $checkNotification->save();
            } else {
                Notifications::create([
                    'vendor_id' => $vendorID,
                    'user_id' => $sessionID,
                    'property_id' => $propertyId,
                    'data' => $selectedValue
                ]);
            }

            return response()->json(['message' => 'Vendor staus updated successfully', 'status' => $selectedValue]);
        } else {
            return response()->json(['message' => 'Vendor property not found'], 404);
        }
    }

    public function search_admin_properties(Request $request)
    {

        $search = $request->input('search');

        $query = properties::where(function ($query) use ($search) {
            $query->where('property_name', 'like', "%{$search}%")
                ->orWhere('pg_name', 'like', "%{$search}%");
        });
        $results = $query->get();
        return response()->json($results);
    }

    public function manage_all_blogs()
    {

        $title = "Manage All Blogs | Ghar Ka Sapna - Admin Dashboard";
        $pagetitle = "Manage All Blogs";
        $blogData = Blog::orderBy('created_at', 'desc')->paginate(10);
        return view('gharkasapna.innerpage.all_blog', compact('title', 'pagetitle', 'blogData'));
    }

    public function manage_blogs_status(Request $request)
    {

        $selectedValue = $request->input('selectedValue');
        $blogId = $request->input('blogId');
        $blogstatus = Blog::find($blogId);
        if ($blogstatus) {

            $blogstatus->status = $selectedValue;

            $blogstatus->save();
            return response()->json(['message' => 'Blog staus updated successfully']);
        } else {
            return response()->json(['message' => 'Blog  not found'], 404);
        }
    }


    public function manage_add_blog()
    {

        $title = "Add New Blog | Ghar Ka Sapna - Admin Dashboard";
        $pagetitle = "Add New Blog";
        $categoryData = Category::orderBy('created_at', 'desc')->get();
        return view('gharkasapna.innerpage.add_blog', compact('title', 'pagetitle', 'categoryData'));
    }

    public function add_blog_category(Request $request)
    {

        $categoryName = $request->input('category');

        $existingCategory = Category::where('name', $categoryName)->first();

        if ($existingCategory) {
            return response()->json(['message' => 'Category already exists'], 422);
        }

        $newCategory = new Category();
        $newCategory->name = $categoryName;
        $newCategory->slug = $categoryName;
        $newCategory->save();

        return response()->json([
            'message' => 'Category added successfully',
            'category' => $newCategory
        ], 200);
    }

    public function manage_create_blog(Request $request)
    {

        $blogName = $request->input('blog_name');
        $authorName = session()->get('name');
        $metaTitle = $request->input('meta_title');
        $metaDescription = $request->input('meta_description');
        $meta_keywords = $request->input('meta_keywords');
        $blogDescription = $request->input('blog_description');
        $shortDescription = $request->input('short_description');
        $add_tick_description = $request->input('add_tick_description');
        $tick_label = $request->input('tick_label');
        $categories = $request->input('categories');


        $TickLable = is_array($tick_label) ? implode(',', $tick_label) : $tick_label;


        $blogImage = null;

        if ($request->hasFile('blog_image')) {
            $image = $request->file('blog_image');
            if ($image->isValid()) {
                $originalExtension = $image->getClientOriginalExtension();
                $newExtension = 'webp';
                $uniqueName = Str::random(15) . '.' . $newExtension;
                $imagePath = public_path('uploads/images/' . $uniqueName);
                $image->move(public_path('uploads/images/'), $uniqueName);

                $blogImage = $uniqueName;
            }
        }

        $otherImage = null;
        if ($request->hasFile('other_image')) {
            $image = $request->file('other_image');
            if ($image->isValid()) {
                $originalExtension = $image->getClientOriginalExtension();
                $newExtension = 'webp';
                $uniqueName = Str::random(15) . '.' . $newExtension;
                $imagePath = public_path('uploads/images/' . $uniqueName);
                $image->move(public_path('uploads/images/'), $uniqueName);

                $otherImage = $uniqueName;
            }
        }

        $submitBlogDATA = [
            'blog_name' => $blogName,
            'blog_description' => $blogDescription,
            'images' => $blogImage,
            'status' => 'Pending',
            'other_image' => $otherImage,
            'tick_label' => $TickLable,
            'tick_description' => $add_tick_description,
            'meta_title' => $metaTitle,
            'meta_description' => $metaDescription,
            'meta_keywords' => $meta_keywords,
            'categories' => $categories,
            'author_name' => $authorName,
            'short_description' => $shortDescription
        ];


        $insertBlog = Blog::create($submitBlogDATA);

        if ($insertBlog) {

            return redirect()->route('manage.blogs')->with('success', 'Blog added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add blog. Please try again.');
        }
    }

    public function manage_update_blog($name)
    {

        $blogName = str_replace("-", ' ', $name);

        $title = "Update $blogName | Ghar Ka Sapna - Admin Dashboard";
        $pageTitle = "Update $blogName";
        $categoryData = Category::orderBy('created_at', 'desc')->get();
        $blogData = Blog::where('blog_name', 'like', "%$blogName%")->first();

        return view('gharkasapna.innerpage.update_blog', compact('title', 'pageTitle', 'categoryData', 'blogData'));
    }

    public function submit_data_update_blog(Request $request)
    {

        $blogID = $request->input('blog_id');

        $checkBlog = Blog::find($blogID);

        $tick_label = $request->input('tick_label');
        if ($tick_label !== null) {
            $existingAddTickLabels = $checkBlog->tick_label;
            $existingAddTickLabelsArray = $existingAddTickLabels ? explode(',', $existingAddTickLabels) : [];
            $newAddTickLabelsArray = is_array($tick_label) ? $tick_label : [$tick_label];
            $mergedAddTickLabelsArray = array_unique(array_merge($existingAddTickLabelsArray, $newAddTickLabelsArray));
            $checkBlog->tick_label = implode(',', $mergedAddTickLabelsArray);
        }

        if ($request->hasFile('blog_image')) {
            $image = $request->file('blog_image');
            if ($image->isValid()) {
                $uniqueName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/images/'), $uniqueName);
                $checkBlog->images = $uniqueName;
            }
        }

        if ($request->hasFile('other_image')) {
            $image = $request->file('other_image');
            if ($image->isValid()) {
                $uniqueName = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/images/'), $uniqueName);
                $checkBlog->other_image = $uniqueName;
            }
        }

        $checkBlog->blog_name = $request->input('blog_name');
        $checkBlog->author_name = $request->input('author_name');
        $checkBlog->meta_title = $request->input('meta_title');
        $checkBlog->meta_description = $request->input('meta_description');
        $checkBlog->meta_keywords = $request->input('meta_keywords');
        $checkBlog->blog_description = $request->input('blog_description');
        $checkBlog->short_description = $request->input('short_description');
        $checkBlog->tick_description = $request->input('add_tick_description');
        $checkBlog->categories = $request->input('categories');

        $checkBlog->save();

        return redirect()->back()->with('success', 'Blog updated successfully!');
    }

    public function manage_delete_blog(Request $request)
    {

        $blogId = $request->input('blogId');
        $blogDATA = Blog::find($blogId);

        if (!$blogDATA) {
            return response()->json(['error' => 'Property not found'], 404);
        }

        $blogDATA->delete();

        return response()->json(['success' => true], 200);
    }

    public function manage_blog_detail($name)
    {

        $formattedName = str_replace('-', ' ', $name);


        $title = "{$formattedName} - Blog Details | Ghar Ka Sapna - Admin Dashboard";
        $pageTitle = "{$formattedName} - Blog Details";
        $blogData = Blog::where('blog_name', 'like', "%$formattedName%")->first();
        $nextBlog = Blog::where('created_at', '>', $blogData->created_at)->orderBy('created_at')->first();
        $previousBlog = Blog::where('created_at', '<', $blogData->created_at)->orderBy('created_at', 'desc')->first();
        $relatedposts = Blog::where('categories', $blogData->categories)->where('id', '!=', $blogData->id)->inRandomOrder()->limit(3)->get();
        $blogcomment = BlogComment::where('blog_id', $blogData->id)->get();

        return view('gharkasapna.innerpage.blog_detail', compact('title', 'pageTitle', 'blogData', 'nextBlog', 'previousBlog', 'relatedposts', 'blogcomment'));
    }

    public function manage_blog_comments(Request $request)
    {

        $blogID = $request->input('blog_id');
        $comment = $request->input('comment');
        $ID = session()->get('id');

        $commentData = BlogComment::create([
            'reg_id' => $ID,
            'blog_id' => $blogID,
            'comments' => $comment
        ]);

        if ($commentData) {
            return redirect()->back()->with('success', 'Comment added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add comment. Please try again.');
        }
    }

    public function manage_blog_search(Request $request)
    {

        $search = $request->input('search');

        $query = Blog::where(function ($query) use ($search) {
            $query->where('blog_name', 'like', "%{$search}%");
        });
        $results = $query->get();
        return response()->json($results);
    }


    public function manage_all_reviews()
    {

        $title = "Manage All Reviews | Ghar Ka Sapna";
        $pageTitle = "Reviews Management";
        $ReviewsData = Reviews::orderBy('created_at', 'desc')->paginate(5);
        $reviewReply =  Review_reply::all();
        return view('gharkasapna.innerpage.admin_manage_all_reviews', compact('title', 'pageTitle', 'ReviewsData', 'reviewReply'));
    }

    public function manage_review_status(Request $request)
    {

        //print_r($request->all());
        $reviewID = $request->input('reviewID');
        $selectedValue = $request->input('selectedValue');
        $ReviewsData = Reviews::where('id', $reviewID)->update(['status' => $selectedValue]);
        return response()->json(['success' => true], 200);
    }

    public function admin_review_reply(Request $request)
    {

        $ID = $request->input('id');
        $replyText = $request->input('replyText');
        $review = Reviews::find($ID);

        if (!$review) {
            return response()->json(['error' => 'Review not found'], 404);
        }

        $createReply = Review_reply::create([
            'review_id' => $ID,
            'user_id' => $review->user_id,
            'property_id' => $review->propertyID,
            'body' => $replyText
        ]);
        return response()->json(['message' => 'Reply added successfully'], 200);
    }

    public function delete_admin_review(Request $request)
    {

        $reviewID = $request->input('reviewID');
        $review = Reviews::find($reviewID);
        if (!$review) {
            return response()->json(['error' => 'Review not found'], 404);
        }
        $reviewReplies = Review_reply::where('review_id', $reviewID)->get();

        foreach ($reviewReplies as $reply) {
            $reply->delete();
        }
        $review->delete();
        return response()->json(['success' => true], 200);
    }



    public function admin_post_properties()
    {

        $sessionID = session()->get('id');
        $title = "Manage Properties - Admin Dashboard | Ghar Ka Sapna";
        $pageTitle = "Post Your Properties";
        $propertiesData = properties::where('vendor_id', $sessionID)->orderBy('created_at', 'desc')->paginate(10);
        return view('gharkasapna.innerpage.admin_properties', compact('title', 'pageTitle', 'propertiesData'));
    }

    public function properties_single_list($name)
    {

        $replaceName = str_replace("-", ' ', $name);
        $sessionID = session()->get('id');

        $title = ucwords($replaceName) . " | Ghar Ka Sapna ";
        $propertiesData = properties::where('property_name', 'like', "%{$replaceName}%")->first();
        $likeproperty = Likeproperty::where('property_id', $propertiesData->id)->where('user_id', $sessionID)->where('vendor_id', $propertiesData->vendor_id)->first();
        $reviewData = Reviews::where('propertyID', $propertiesData->id)->get();
        $propertyIds = $reviewData->pluck('propertyID')->toArray();
        $reviewReply = Review_reply::whereIn('property_id', $propertyIds)->get();

        return view("gharkasapna.innerpage.admin_properties_single_list", compact('title', 'propertiesData', 'reviewData', 'reviewReply', 'likeproperty'));
    }


    public function admin_fav_properties()
    {

        $sessionID = session()->get('id');
        $title = "My Favorites Properties | Ghar Ka Sapna";
        $likeProperties = Likeproperty::where('user_id', $sessionID)->orderBy('created_at', 'desc')->paginate(8);
        return view('gharkasapna.innerpage.admin_fav_properties', compact('title', 'likeProperties'));
    }

    public function admin_dislike_properties(Request $request)
    {

        $propertyId = $request->input('propertyId');

        $property = Likeproperty::find($propertyId);

        if ($property) {
            $property->delete();
            return response()->json(['success' => true, 'message' => 'Property deleted successfully']);
        } else {
            return response()->json(['error' => true, 'message' => 'Failed to delete Property: Property not found'], 404);
        }
    }


    public function admin_manage_package()
    {

        $title = "Your Membership Plans | Ghar Ka Sapna";
        $basicPlans = Membership::where('plan_name', 'basic')->first();
        $standardPlans = Membership::where('plan_name', 'standard')->first();
        $premiumPlans = Membership::where('plan_name', 'premium')->first();
        return view('gharkasapna.innerpage.admin_membership_plans', compact("title", 'basicPlans', 'standardPlans', 'premiumPlans'));
    }

    public function submit_data_basic_plan(Request $request)
    {

        $property = $request->input('maxPropertyListings');
        $price = $request->input('price');

        $featuresArray = $request->input('features');
        $featuresString = !empty($featuresArray) && is_array($featuresArray) ? implode(',', $featuresArray) : '';

        $existingPlan = Membership::where('plan_name', 'basic')->first();

        if ($existingPlan) {


            if (!empty($price)) {
                $existingPlan->price = $price;
            }

            $existingPlan->max_properties = $property;
            if (!empty($featuresString)) {
                $existingPlan->features .= (!empty($existingPlan->features) ? ',' : '') . $featuresString;
            }


            $existingPlan->status = 'pending';
            $updateResult = $existingPlan->save();
            if ($updateResult) {
                return response()->json(['success' => true, 'membershipPlan' => $existingPlan]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            $submitBasicData = Membership::create([
                'plan_name' => 'basic',
                'price' => $price,
                'max_properties' => $property,
                'features' => $featuresString,
                'status' => "pending"
            ]);

            if ($submitBasicData) {
                return response()->json(['success' => true, 'membershipPlan' => $submitBasicData]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function delete_basic_feature(Request $request)
    {
        $feature = $request->input('feature');

        $existingPlan = Membership::where('plan_name', 'basic')->first();

        $featuresArray = explode(',', $existingPlan->features);
        $index = array_search($feature, $featuresArray);

        if ($index !== false) {

            unset($featuresArray[$index]);
            $featuresString = implode(',', $featuresArray);
            $existingPlan->features = $featuresString;
            $existingPlan->save();
            return response()->json(['success' => true, 'message' => 'Feature deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Feature Not Found']);
        }
    }

    public function submit_data_standard_plan(Request $request)
    {
        $featuresArray = $request->input("Standardfeatures");
        $propertiesList = $request->input("propertyListing");
        $price = $request->input("price");

        $featuresString = !empty($featuresArray) && is_array($featuresArray) ? implode(',', $featuresArray) : '';

        $existingPlan = Membership::where('plan_name', 'standard')->first();

        if ($existingPlan) {
            if (!empty($price) || $price === '0') {
                $existingPlan->price = $price;
            }
            $existingPlan->max_properties = $propertiesList;

            if (!empty($featuresString)) {
                $existingPlan->features .= (!empty($existingPlan->features) ? ',' : '') . $featuresString;
            }

            $existingPlan->status = 'pending';
            $updateResult = $existingPlan->save();

            if ($updateResult) {
                return response()->json(['success' => true, 'membershipPlan' => $existingPlan]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            $createStandardPlan = Membership::create([
                'plan_name' => 'standard',
                'price' => $price,
                'max_properties' => $propertiesList,
                'features' => $featuresString,
                'status' => "pending"
            ]);

            if ($createStandardPlan) {
                return response()->json(['success' => true, 'membershipPlan' => $createStandardPlan]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function delete_standard_feature(Request $request)
    {

        $feature = $request->input('feature');
        $existingPlan = Membership::where('plan_name', 'standard')->first();
        $featuresArray = explode(',', $existingPlan->features);
        $index = array_search($feature, $featuresArray);

        if ($index !== false) {
            unset($featuresArray[$index]);
            $featuresArray = array_values($featuresArray);

            $featuresString = implode(',', $featuresArray);

            $existingPlan->features = $featuresString;
            $existingPlan->save();

            return response()->json(['success' => true, 'message' => 'Feature deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => "Feature not found"]);
        }
    }

    public function submit_data_premium_plan(Request $request)
    {
        //print_r($request->all());
        $propertylist = $request->input('propertyListing');
        $featuresArray = $request->input('premiumFeatures');
        $price = $request->input('price');
        $featuresString = !empty($featuresArray) && is_array($featuresArray) ? implode(',', $featuresArray) : '';
        $existingPlan = Membership::where('plan_name', 'premium')->first();

        if ($existingPlan) {

            if (!empty($price)) {
                $existingPlan->price = $price;
            }

            $existingPlan->max_properties = $propertylist;

            if (!empty($featuresString)) {
                $existingPlan->features .= (!empty($existingPlan->features) ? ',' : '') . $featuresString;
            }

            $existingPlan->status = 'pending';
            $updateResult = $existingPlan->save();


            if ($updateResult) {
                return response()->json(['success' => true, 'membershipPlan' => $existingPlan]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            $submitPremiumData = Membership::create([
                'plan_name' => 'premium',
                'price' => $price,
                'max_properties' => $propertylist,
                'features' => $featuresString,
                'status' => "pending"
            ]);

            if ($submitPremiumData) {
                return response()->json(['success' => true, 'membershipPlan' => $submitPremiumData]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }


    public function delete_premium_feature(Request $request)
    {
        //print_r($request->all());

        $feature = $request->input("featureValue");

        $existingPlan = Membership::where('plan_name', 'premium')->first();
        $featuresArray = explode(',', $existingPlan->features);

        $index = array_search($feature, $featuresArray);

        if ($index !== false) {
            unset($featuresArray[$index]);

            $featuresString = implode(',', $featuresArray);
            $existingPlan->features = $featuresString;
            $existingPlan->save();

            return response()->json(['success' => true, 'message' => 'Feature deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Feature Not Found']);
        }
    }

    public function manage_basic_status(Request $request)
    {

        $status = $request->input('status');


        if ($status === "published" || $status === "pending") {

            $existingPlan = Membership::where('plan_name', 'basic')->update(['status' => $status]);


            if ($existingPlan !== false) {
                return response()->json(['success' => true, 'message' => 'Status updated successfully!', 'status' => $status]);
            } else {
                return response()->json(['success' => false, 'message' => 'Plan not found']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid status value']);
        }
    }

    public function manage_standard_status(Request $request)
    {
        $status = $request->input('status');


        if ($status === "published" || $status === "pending") {

            $existingPlan = Membership::where('plan_name', 'standard')->update(['status' => $status]);


            if ($existingPlan !== false) {
                return response()->json(['success' => true, 'message' => 'Status updated successfully!', 'status' => $status]);
            } else {
                return response()->json(['success' => false, 'message' => 'Plan not found']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid status value']);
        }
    }

    public function manage_premium_status(Request $request)
    {

        $status = $request->input('status');
        if ($status === "published" || $status === "pending") {

            $existingPlan = Membership::where('plan_name', 'premium')->update(['status' => $status]);


            if ($existingPlan !== false) {
                return response()->json(['success' => true, 'message' => 'Status updated successfully!', 'status' => $status]);
            } else {
                return response()->json(['success' => false, 'message' => 'Plan not found']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid status value']);
        }
    }

    public function remove_property_image(Request $request)
    {
        // print_r($request->all());     
        $ID = $request->input('propertyID');
        $image = $request->input('image');
        $property = properties::find($ID);

        $storedImages = explode(',', $property->images);

        $index = array_search($image, $storedImages);
        unset($storedImages[$index]);
        $storedImages = array_values($storedImages);
        $imagestring = implode(',', $storedImages);

        $property->images = $imagestring;
        $property->save();
        return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
    }

    public function remove_property_video(Request $request) {
        $videoID  = $request->input('videoID');
        $property = properties::find($videoID );
        if($property){
            $property->videos = null;
            $property->save();
            return response()->json(['success' => true, 'message' => 'Video removed successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'Property not found']);

    }

    public function manage_delete_property(Request $request)
    {

        $propertyID = $request->input('propertyID');
        $property = properties::find($propertyID);

        if ($property) {
            $property->delete();
            return response()->json(['success' => true, 'message' => 'Property deleted successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Property not found']);
    }


    public function update_post_property(Request $request)
    {
        //dd($request->all());
        $propertyImages = [];
        $propertyID = $request->input('property_id');
        $propertyType = $request->input('property_type');
        $pgName = $request->input('pg_name');
        $replacepgName = str_replace(array(',', '-', '/', '(', ')', ';', '.'), '', $pgName) . ' ';
        //dd($replacepgName);
        $lookingTo = $request->input('looking_to');
        $category_type = $request->input('category_type');
        $property = properties::find($propertyID);

        if ($request->hasFile('property_img')) {
            foreach ($request->file('property_img') as $image) {
                if ($image->isValid()) {
                    $originalExtension = $image->getClientOriginalExtension();
                    $newExtension = 'webp';
                    $uniqueName = Str::random(10) . '.' . $newExtension;
                    $propertyImages[] = $uniqueName;

                    $imagePath = public_path('assets/property-images/' . $uniqueName);
                    $image->move(public_path('assets/property-images/'), $uniqueName);
                }
            }
        }



        if ($request->hasFile('property_video')) {
            $video = $request->file('property_video');
            if ($video->isValid()) {
                $uniqueNamevideo = Str::random(10) . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('assets/property-videos'), $uniqueNamevideo);
                $property->videos = $uniqueNamevideo; 
            }
        }
        

        // $propertyVideosString = implode(',', $propertyVideos);


        $existingImages = explode(',', $property->images);
        $combinedImages = array_merge($existingImages, $propertyImages);
        $combinedImagesString = implode(',', $combinedImages);
        $property->images = $combinedImagesString;
        // if ($propertyVideos) {
        //     $property->videos = $propertyVideos;
        // }
        $property->save();

        if ($property) {

            if ($propertyType == 'residential' && $lookingTo == 'pg') {

                $property->update([
                    
                    // 'property_name' => $request->input('pg_name'),
                    'property_name' => $replacepgName,
                    'city' => $request->input('search_city'),
                    'project_society' => $request->input('project_society'),
                    'locality' => $request->input('locality'),
                    'pg_name' => $request->input('pg_name'),
                    'total_property' => $request->input('total_beds'),
                    'pg_for' => $request->input('pg_for'),
                    'suited_for' => $request->input('pg_suited_for'),
                    'meals_available' => $request->input('pg_meals'),
                    'meal_offerings' => implode(',', $request->input('meal_offerings')),
                    'meal_speciality' => implode(',', $request->input('meal_speciality')),
                    'notice_period' => $request->input('notice_period'),
                    'lock_in_period' => $request->input('lock_period'),
                    'common_areas' => implode(',', $request->input('common_areas')),
                    'ownership' => $request->input('owner_details'),
                    'stays' => $request->input('stays_property'),
                    'rules_non_veg' => $request->input('pg_non_veg'),
                    'rules_opposite_sex' => $request->input('pg_sex'),
                    'rules_any_time' => $request->input('pg_time_allowed'),
                    'rules_visitors' => $request->input('visitors_allowed'),
                    'rules_guardian' => $request->input('guardian_allowed'),
                    'rules_drink_smok' => $request->input('drin_smok_allowed'),
                    'room_type' => $request->input('pg_room_type'),
                    'bed_in_room' => $request->input('total_beds_this_room'),
                    'amenites' => implode(',', $request->input('pg_facilities')),
                    'bathroom_style' => implode(',', $request->input('bath_style')),
                    'rent' => $request->input('monthly_rent'),
                    'security_deposity' => $request->input('secuirty_deposite'),
                    'move_in_charge' => $request->input('pg_onetime_move_charges'),
                    'meal_charges' => $request->input('pg_meal_charges_month'),
                    'electricity_charges' => $request->input('pg_electricity_charges_month'),
                    'additional_information' => $request->input('additional_information'),
                ]);


                return redirect()->back()->with('success', 'Property updated successfully!');
            }

            if ($propertyType == 'residential' && $lookingTo == 'rent' && ($category_type == 'apartment' || $category_type == 'independent house' || $category_type == 'independent floor')) {

                $property->update([

                    'property_name' => $request->input('property_name'),
                    'city' => $request->input('search_city'),
                    'project_society' => $request->input('project_society'),
                    'locality' => $request->input('locality'),
                    'total_property' => $request->input('total_property'),
                    'built_up_area' => $request->input('built_up_area'),
                    'bath' => $request->input('bath'),
                    'balconies' => $request->input('balconies'),
                    'age_of_property' => $request->input('age_of_property'),
                    'furnishing' => $request->input('furnishing'),
                    'available_from' => $request->input('available_from'),
                    'rent' => $request->input('monthly_rent'),
                    'security_deposity' => $request->input('secuirty_deposite'),
                    'additional_information' => $request->input('additional_information'),

                ]);

                return redirect()->back()->with('success', 'Property updated successfully!');
            }


            if ($propertyType == 'residential' && $lookingTo == 'sell' && ($category_type == 'apartment' || $category_type == 'independent house' || $category_type == 'independent floor')) {

                $property->update([

                    'property_name' => $request->input('property_name'),
                    'city' => $request->input('search_city'),
                    'project_society' => $request->input('project_society'),
                    'locality' => $request->input('locality'),
                    'total_property' => $request->input('total_property'),
                    'built_up_area' => $request->input('built_up_area'),
                    'bath' => $request->input('bath'),
                    'balconies' => $request->input('balconies'),
                    'age_of_property' => $request->input('age_of_property'),
                    'furnishing' => $request->input('furnishing'),
                    'cost' => $request->input('monthly_rent'),
                    'construection_status' => $request->input('res_sell_constuction_status'),
                    'additional_information' => $request->input('additional_information'),

                ]);

                return redirect()->back()->with('success', 'Property updated successfully!');
            }

            if ($propertyType == 'residential' && $lookingTo == 'sell' && $category_type == 'plot') {

                $property->update([
                    'property_name' => $request->input('property_name'),
                    'city' => $request->input('search_city'),
                    'project_society' => $request->input('project_society'),
                    'locality' => $request->input('locality'),
                    'plot_area' => $request->input('plot_area'),
                    'carpet_area' => $request->input('area_unit'),
                    'area_height' => $request->input('plot_length'),
                    'area_width' => $request->input('plot_width'),
                    'cost' => $request->input('monthly_rent'),
                    'construection_status' => $request->input('res_sell_constuction_status'),
                    'additional_information' => $request->input('additional_information'),
                ]);

                return redirect()->back()->with('success', 'Property updated successfully!');
            }

            if ($propertyType == 'commercial' && $category_type == 'office') {

                $propertyData = [
                    'property_name' => $request->input('property_name'),
                    'city' => $request->input('search_city'),
                    'project_society' => $request->input('project_society'),
                    'locality' => $request->input('locality'),
                    'built_up_area' => $request->input('built_up_area'),
                    'posession_status' => $request->input('posession_status'),
                    'available_from' => $request->input('available_from'),
                    'zone_type' => $request->input('zone_type'),
                    'location_hub' => $request->input('location_hub'),
                    'ownership' => $request->input('ownership'),
                    'negotiable' => $request->input('negotiable'),
                    'dg_ups_charge' => $request->input('dg_ups_charge'),
                    'electricity_charges_include' => $request->input('electricity_charges'),
                    'water_charges' => $request->input('water_charges'),
                    'total_property' => $request->input('total_floors'),
                    'your_floor' => $request->input('your_floor'),
                    'staircase' => $request->input('staircase'),
                    'passengers_lifts' => $request->input('lifts_staircases_passengers'),
                    'service_lifts' => $request->input('lifts_staircases_service'),
                    'conference_room' => $request->input('conference_room'),
                    'min_seats' => $request->input('office_seats'),
                    'max_seats' => $request->input('office_max_seats'),
                    'cabins' => $request->input('number_of_cabins'),
                    'meeting_room' => $request->input('meeting_rooms'),
                    'private_parking' => $request->input('private_parking'),
                    'public_parking' => $request->input('public_parking'),
                    'private_washrooms' => $request->input('private_washrooms'),
                    'public_washrooms' => $request->input('public_washrooms'),
                    'additional_information' => $request->input('additional_information'),
                ];

                if ($lookingTo == 'rent') {
                    $propertyData['rent'] = $request->input('monthly_rent');
                    $propertyData['security_deposity'] = $request->input('security_deposite');
                } else if($lookingTo == 'sell') {
                    $propertyData['cost'] = $request->input('monthly_rent');
                    $propertyData['lock_in_period'] = $request->input('lock_in_period');
                }

                $property->update($propertyData);
                return redirect()->back()->with('success', 'Property updated successfully!');
            }

            if($propertyType == 'commercial' && ($category_type == 'retail shop' || $category_type == 'showroom')) {

                $propertyData = [

                    'property_name' => $request->input('property_name'),
                    'city' => $request->input('search_city'),
                    'project_society' => $request->input('project_society'),
                    'locality' => $request->input('locality'),
                    'built_up_area' => $request->input('built_up_area'),
                    'posession_status' => $request->input('posession_status'),
                    'available_from' => $request->input('available_from'),
                    'zone_type' => $request->input('zone_type'),
                    'location_hub' => $request->input('location_hub'),
                    'area_width' => $request->input('comm_area_width'),
                    'area_height' => $request->input('comm_area_height'),
                    'located_near' => $request->input('comm_located_near'),
                    'ownership' => $request->input('ownership'),
                    'negotiable' => $request->input('negotiable'),
                    'dg_ups_charge' => $request->input('dg_ups_charge'),
                    'electricity_charges_include' => $request->input('electricity_charges'),
                    'water_charges' => $request->input('water_charges'),
                    'total_property' => $request->input('total_floors'),
                    'your_floor' => $request->input('your_floor'),
                    'staircase' => $request->input('staircase'),
                    'passengers_lifts' => $request->input('lifts_staircases_passengers'),
                    'service_lifts' => $request->input('lifts_staircases_service'),
                    'private_parking' => $request->input('private_parking'),
                    'public_parking' => $request->input('public_parking'),
                    'private_washrooms' => $request->input('private_washrooms'),
                    'public_washrooms' => $request->input('public_washrooms'),
                    'additional_information' => $request->input('additional_information'),
                ];


                if ($lookingTo == 'rent') {
                    $propertyData['rent'] = $request->input('monthly_rent');
                    $propertyData['security_deposity'] = $request->input('security_deposite');
                } elseif($lookingTo == 'sell') {
                    $propertyData['cost'] = $request->input('monthly_rent');
                }

                $property->update($propertyData);
                return redirect()->back()->with('success', 'Property updated successfully!');
                

            }

            if($propertyType == 'commercial' && $category_type == 'plot') {

                $propertyData = [

                    'property_name' => $request->input('property_name'),
                    'city' => $request->input('search_city'),
                    'project_society' => $request->input('project_society'),
                    'locality' => $request->input('locality'),
                    'plot_area' => $request->input('plot_area'),
                    'carpet_area' => $request->input('area_unit'),
                    'available_from' => $request->input('available_from'),
                    'zone_type' => $request->input('zone_type'),
                    'ownership' => $request->input('ownership'),
                    'negotiable' => $request->input('negotiable'),
                    'dg_ups_charge' => $request->input('dg_ups_charge'),
                    'electricity_charges_include' => $request->input('electricity_charges'),
                    'additional_information' => $request->input('additional_information'),

                ];
                if ($lookingTo == 'rent') {
                    $propertyData['rent'] = $request->input('monthly_rent');
                    $propertyData['security_deposity'] = $request->input('security_deposite');

                } elseif ($lookingTo == 'sell') {

                    $propertyData['cost'] = $request->input('monthly_rent');
                }

                $property->update($propertyData);
                return redirect()->back()->with('success', 'Property updated successfully!');
            }
        }
    }
}
