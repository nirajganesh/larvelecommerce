<div >
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Category Delete</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="destroyCategory">
                        <div class="modal-body">
                           <h6>Are You Sure you want to delete this data?</h6>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                    
            </div>
       </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif
        <div class="card">
            <div class="card-header">
                <h3>
                    Categories
                    <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm float-end">Add Category</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td><img src="{{'/uploads/category/'.$category->image}}" width="60px" height="60px"/></td>
                                <td>{{$category->status=='1'?'Hidden':'Visible'}}</td>
                                <td>
                                    <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-warning">Edit</a>
                                    <a href="#" data-bs-toggle="modal" wire:click="deleteCategory({{$category->id}})"  data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                                </td>
                            </tr> 
                            
                            @endforeach
                    </tbody>
                </table>
                <div class="mt-3 float-end">
                    {{$categories->links()}} 
                </div>
                
            </div>
        </div>
        </div>
    </div>   
</div>

@push('script')
 
  <script>
      window.addEventListener('close-modal',event=>{
        $('#deleteModal').modal('hide');
      });
  </script>
@endpush
 
