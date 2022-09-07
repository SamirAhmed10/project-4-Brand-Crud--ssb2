@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
     <h4>Update Category Information</h4>
    </div>
 </div>
  <div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Update Category Information</h6>
      <form action="{{ route('category.update', $categorie->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-lg-6">
              <div class="form-group">
                 <label>Category name</label>
                 <input type="text" class="form-control"  name="name" placeholder="Enter Category Name" required="required" autocomplete="off" value="{{$categorie->name}}">
              </div>
              <div class="form-group">
                <label>Primary Category[optional]</label>
                <select class="form-control" name="is_parent">
                   <option value='0'>Please select the  category</option>
                   <!-- parent category-->
                   @foreach($parents as $p)
          
                   
                   <option value="{{ $p->id }}"
                   @if( $categorie->is_parent == 0 )
                    
                    @elseif($categorie->is_parent != 0 )
                      @if($p->id==$categorie->is_parent)
                        selected
                       @endif
                    @endif
                   >{{$p->name}}
                   </option>
                    <!-- sub Category1 -->
                    @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $p->id)->get() as $cat )
                     <option value="{{ $cat->id }}"
                     @if( $categorie->is_parent == 0 )
                    
                    @elseif($categorie->is_parent != 0 )
                      @if($cat->id==$categorie->is_parent)
                        selected
                       @endif
                    @endif
                   >{{$p->name}}->{{$cat->name}}
                     </option>
                     <!-- sub Category2 -->
                     @if($cat->count()!=0)
                    
                     @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $cat->id)->get() as $child )
                     <option value="{{ $child->id }}"
                     @if( $categorie->is_parent == 0 )
                    
                    @elseif($categorie->is_parent != 0 )
                      @if($child->id==$categorie->is_parent)
                        selected
                       @endif
                    @endif
                  >{{$p->name}}->{{$cat->name}}->{{$child->name}}
                     </option>
                     <!-- sub Category3 -->
                     @if($child->count()!=0)
                     
                     @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $child->id)->get() as $chi )
                     <option value="{{ $chi->id }}"
                     @if( $categorie->is_parent == 0 )
                    
                    @elseif($categorie->is_parent != 0 )
                      @if($chi->id==$categorie->is_parent)
                        selected
                       @endif
                    @endif
                    >{{$p->name}}->{{$cat->name}}->{{$child->name}}->{{$chi->name}}
                     </option>
                     <!-- sub category4 -->
                     @if($chi->count()!=0)
                     @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $chi->id)->get() as $ch )
                     <option value="{{ $ch->id }}"
                     @if( $categorie->is_parent == 0 )
                    
                    @elseif($categorie->is_parent != 0 )
                      @if($ch->id==$categorie->is_parent)
                        selected
                       @endif
                    @endif
                  >{{$p->name}}->{{$cat->name}}->{{$child->name}}->{{$chi->name}}->{{$ch->name}}
                     </option>
                     <!-- sub category5 -->
                     @if($ch->count()!=0)
                     @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $ch->id)->get() as $c )
                     <option value="{{ $c->id }}"
                     @if( $categorie->is_parent == 0 )
                    
                    @elseif($categorie->is_parent != 0 )
                      @if($c->id==$categorie->is_parent)
                        selected
                       @endif
                    @endif
                  >{{$p->name}}->{{$cat->name}}->{{$child->name}}->{{$chi->name}}->{{$ch->name}}->{{$c->name}}
                    </option>
                     @endforeach
                      @endif
                     @endforeach
                     @endif


                     @endforeach
                     @endif
                     @endforeach
                     @endif
                     @endforeach
                     @endforeach
                </select>
             </div>
 
              <div class="form-group">
                 <label>Status</label>
                 <select class="form-control" name="status">
                    <option value='0'>Please select the status</option>
                    <option value='1' @if($categorie->status == 1 )  
                     selected 
                     @endif
                     >Active</option>
                    <option value='0' @if($categorie->status == 0) 
                     selected 
                     @endif
                     >Inactive</option>
                 </select>
              </div>
              <div class="form-group">
                 <label>Display</label>
                 <select class="form-control" name="display">
                    <option value='1'>Please select the display</option>
                    <option value='1' @if($categorie->display == 1 )  
                     selected 
                     @endif
                     >Active</option>
                    <option value='0' @if($categorie->display == 0) 
                     selected 
                     @endif
                     >Inactive</option>
                 </select>
              </div>
         </div>
           
          <div class="col-lg-6">
                <div class="form-group">
                  <label>Category Description</label>
                  <textarea class="form-control" name="description" rows="5">{{$categorie->description}}</textarea>
                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control-file"  name="image">
               </div>
          </div>
          <div class="col-lg-12">  
            <div class="form-group">
               <input type="submit" name="updatecategory" value="Update" class="btn btn-dark mg-b-10">
            </div>
          </div>
       </div>
      </form>
    </div>
  </div>
@endsection