<div class="form-group">
                <label>Secondary Category[optional]</label>
                <select class="form-control" name="is_secondary">
                 <  <option value='1'>Please select the secondary category</option>
                   @foreach($secondaries as $s)
                   @if($s->is_parent!=0)
                   <option value="{{ $s->id }}">{{$s->name}}
                   </option>
                   @endif
                   @endforeach
                </select>
              </div>


              @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $Category->id)->where('is_secondary',1)->get() as $childCat)
      <tr>
         <th scope="row"></th>
           <td>
             @if(!empty($childCat->image))
             <img src="{{asset('backend/img/category/'.$childCat->image)}}"height="40">
           
            @else
             No image found
            @endif
          </td>
         <td>{{ $childCat->name }}</td>
         <td>

           @if ( $childCat->is_parent == 0 )
             <span class="badge badge-primary">Primary Category</span>
           @elseif($childCat->is_secondary == 1)
              <span class="badge badge-primary">Secondary Category</span>
           @endif

          </td>
        <td>

        @if ( $childCat->status == 0 )
           <span class="badge badge-danger">Inactive</span>
         @elseif ( $childCat->status == 1 )
           <span class="badge badge-success">Active</span>
         @endif
        </td>
        <td>
         <div class="action-button">
          <ul>
            <li><a href="{{ route('category.edit',$childCat->id) }}"><i class="fa fa-edit"></i></a></li>
            <li><a href="" data-toggle="modal" data-target="#delete{{$childCat->id}}"><i class="fa fa-trash"></i></a></li>
          </ul>
        <div class="modal fade" id="delete{{$childCat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
          <div class="modal-content">
           <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Do you want to confirm delete this category</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
         <div class="modal-body">
         <div class="modal-buttons">
          <ul>
            <li>
                
              <form action="{{ route('category.destroy', $childCat->id ) }}" method="POST">
               @csrf
                  <input type="submit" name="delete" class="btn btn-danger" value="confirm">
              </form>
           </li>
           <li>
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
           </li>
         </ul>
        </div>
    
          </div>
 
         </div>
         </div>
         </div>


        </div>
        </td>

      </tr>



      @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_secondary', $childCat->id)->get() as $ChildCat)
      <tr>
         <th scope="row"></th>
           <td>
             @if(!empty($ChildCat->image))
             <img src="{{asset('backend/img/category/'.$ChildCat->image)}}"height="40">
           
            @else
             No image found
            @endif
          </td>
         <td>{{ $ChildCat->name }}</td>
         <td>

           @if ( $ChildCat->is_parent == 0 )
             <span class="badge badge-primary">Primary Category</span>
           @elseif($ChildCat->is_secondary == 1)
              <span class="badge badge-primary">Secondary Category</span>
           @endif

          </td>
        <td>

        @if ( $ChildCat->status == 0 )
           <span class="badge badge-danger">Inactive</span>
         @elseif ( $ChildCat->status == 1 )
           <span class="badge badge-success">Active</span>
         @endif
        </td>
        <td>
         <div class="action-button">
          <ul>
            <li><a href="{{ route('category.edit',$ChildCat->id) }}"><i class="fa fa-edit"></i></a></li>
            <li><a href="" data-toggle="modal" data-target="#delete{{$ChildCat->id}}"><i class="fa fa-trash"></i></a></li>
          </ul>
        <div class="modal fade" id="delete{{$ChildCat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
          <div class="modal-content">
           <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Do you want to confirm delete this category</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
         <div class="modal-body">
         <div class="modal-buttons">
          <ul>
            <li>
                
              <form action="{{ route('category.destroy', $ChildCat->id ) }}" method="POST">
               @csrf
                  <input type="submit" name="delete" class="btn btn-danger" value="confirm">
              </form>
            </li>
           <li>
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
           </li>
         </ul>
        </div>
    
          </div>
 
         </div>
         </div>
         </div>


        </div>
        </td>

      </tr> 
      @endforeach




      
      @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $Category->id)->get() as $childCat)
      <tr>
         <th scope="row"></th>
           <td>
             @if(!empty($childCat->image))
             <img src="{{asset('backend/img/category/'.$childCat->image)}}"height="40">
           
            @else
             No image found
            @endif
          </td>
         <td>{{ $childCat->name }}</td>
         <td>

           @if ( $childCat->is_parent == 0 )
             <span class="badge badge-primary">Primary Category</span>
           
           @endif

          </td>
        <td>

        @if ( $childCat->status == 0 )
           <span class="badge badge-danger">Inactive</span>
         @elseif ( $childCat->status == 1 )
           <span class="badge badge-success">Active</span>
         @endif
        </td>
        <td>
         <div class="action-button">
          <ul>
            <li><a href="{{ route('category.edit',$childCat->id) }}"><i class="fa fa-edit"></i></a></li>
            <li><a href="" data-toggle="modal" data-target="#delete{{$childCat->id}}"><i class="fa fa-trash"></i></a></li>
          </ul>
        <div class="modal fade" id="delete{{$childCat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
          <div class="modal-content">
           <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Do you want to confirm delete this category</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
         <div class="modal-body">
         <div class="modal-buttons">
          <ul>
            <li>
                
              <form action="{{ route('category.destroy', $childCat->id ) }}" method="POST">
               @csrf
                  <input type="submit" name="delete" class="btn btn-danger" value="confirm">
              </form>
           </li>
           <li>
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
           </li>
         </ul>
        </div>
    
          </div>
 
         </div>
         </div>
         </div>


        </div>
        </td>

      </tr>
      @if (is_countable($childCat) && count($childCat) > 0)
        @foreach($childCat as $child)
       @php $child->id=$childCat->id; @endphp
         @endforeach
       @endif
      

      <!-- ChildCat start-->
      
        <!-- ChildCat end-->
   @endforeach






   @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $cat->id)->get() as $child )
                     <option value="{{ $child->id }}">{{$p->name}}->{{$cat->name}}->{{$child->name}}
                     </option>
                     @if($child->count()!=0)
                     @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $child->id)->get() as $chi )
                     <option value="{{ $chi->id }}">{{$p->name}}->{{$cat->name}}->{{$child->name}}->{{$chi->name}}
                     </option>
                     @endforeach
                     @endif


                     @endforeach


                     <div class="form-group">
                <label>Primary Category[optional]</label>
                 <select class="form-control" name="is_parent">
                   <option value='0'>Please select the primary category</option>
                   @foreach($parents as $p)
                    <option value="{{ $p->id }}"
                     @if( $categorie->is_parent == 0 )
                    
                     @elseif($categorie->is_parent != 0 )
                       @if($p->id==$categorie->is_parent)
                         selected
                        @endif
                     @endif

                     > {{$p->name}}
                   </option>
                   @endforeach
                </select>
              </div>