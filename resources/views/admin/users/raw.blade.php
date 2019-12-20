<table class="table table-bordered ">
<thead>
<tr>
    <th>SR. No.</th>
    <th>Name </th>
    <th>Email </th>
    <th>Role </th>
    <th>Action </th>
</tr>
</thead>
<tbody>
@forelse($lists as $row) 
<tr>
   <th>&nbsp;&nbsp;{{ ($lists ->currentpage()-1) * $lists ->perpage() + $loop->index + 1 }}</th>
    <td>{{$row->first_name}} {{$row->last_name}}</td>
    <td>{{$row->email}}</td>
    <td class="text-capitalize">{{$row->role}}</td>
    <td>
        <a href="{{ URL::to('admin/users/'.$row->id.'/edit') }}"><i class="la la-edit"></i></a> &nbsp; 
        <a href="javascript:;" class="delete_user" data-id="{{$row->id}}"> <i class="la la-trash"></i></a>
    </td>
</tr>
@empty
<tr> 
     <td class="text-center" colspan="9"> No data found.....</td>   
</tr>
@endforelse
</tbody>
</table>
{{ $lists->links() }}