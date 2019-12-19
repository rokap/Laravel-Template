<form action="{{route('projects.store')}}" method="post">

    <div class="modal-header">
        <h4 class="modal-title">Create Project</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        @csrf
        <div class="row">
            <div class="col">

                <div class="form-group">
                    <label>Customer</label>
                    <select name="customer_id" class="form-control my-select" data-live-search="true" title="Select Customer" data-style="form-control" id="customer_id">
                        @foreach($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter a Project Name">
                </div>
                <div class="form-group">
                    <label>Due Date ( Optional )</label>
                    <input type="text" name="due_date" class="form-control" id="due-date" placeholder="Project due">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="description" class="form-control" rows="10"
                              placeholder="Short description about project">{{old('description')}}</textarea>

                </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Save changes</button>
    </div>


</form>

<script>

    $(function () {
        $("#due-date").datepicker({
            changeMonth: true,
            changeYear: true,
            format: "yyyy-mm-dd"
        });
        $('.my-select').selectpicker({
            styleBase: null
        });
    });

</script>