
    <table class="table table-hover">
                    <thead>
                    <tr>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th class="action-css">Action</th>
                        </tr>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($categories as $category)
                    <tr id="row_{!! $category->id !!}">
                       <td>{!! $category->id !!}</td>
                       <td id="txt_category_title_{!! $category->id !!}">{!! $category->category_title !!}</td>
                       <td id="status_{!! $category->id !!}">{!! $category->is_removed == '1' ? 'Active' : 'InActive' !!}</td>
                       <td>
                          <button class="btn btn-primary btn-sm EditRecord" id="{!! $category->id !!}">Edit</button>
                          <button class="btn btn-danger btn-sm DeleteDialogConfirm" action="{!! URL::route('categoryDel', $category->id) !!}" id="{!! $category->id !!}">Delete</button>
                       </td>
                    </tr>
                        @endforeach      
                    </tbody>
                </table>
                {!! $categories->render() !!}