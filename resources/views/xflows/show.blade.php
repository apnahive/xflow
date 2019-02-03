@extends('layouts.app')

@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>

<div class="row" style="margin-bottom: 100px;">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Checklist Items for {{ $checklist->assignto  }}</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <a href="{{ route('checklists.add', $id) }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add From Template</button></a>
            </div>
            <div class="table-data__tool-right">                
                <a href="{{ route('checklist_item.add', $id) }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add New Item</button></a>
            </div>
        </div> 
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>                    
                    <tr>
                        <th>
                            <label class="au-checkbox">
                                <input type="checkbox" id="checkAll" disabled="disabled">
                                <span class="au-checkmark"></span>
                            </label>
                        </th>
                        <th>Items</th>
                        <th>Due Date</th>
                        <th><!-- Sublist --></th>
                        <!-- <th>Managed By</th>
                        <th>Assigned To</th> -->
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $key => $value)
                    <tr class="tr-shadow">
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox" class="item-check" id="item-{{ $value->id }}">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>{{ $value->title }}</td>
                        
                        <td>{{ $value->duedate }}</td>
                        <td>
                            @if($value->sublist == 1)
                                <a href="{{ route('checklist_items.show', $value->id) }}"><i class="fas fa-list" style="color: #63c76a;float: right;" data-toggle="tooltip" title="Sublist"></i></a>
                            @endif
                        </td>
                        <!-- <td></td>                        
                        <td></td> -->
                        <td>
                            <div class="table-data-feature">
                                
                                <a href="{{ route('checklist_items.show', $value->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>                                
                                
                                <a href="{{ route('checklist_items.edit', $value->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button></a>
                                
                                @role('Admin')
                                <button class="item" data-toggle="modal" data-target="#confirm{{$value->id}}" data-backdrop="false">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>

                                

                                <form id="{{$value->id}}" action="" method="POST" style="display: none;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <div class="modal fade" id="confirm{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Under Development
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Task</button>
                                        <a onclick="event.preventDefault(); document.getElementById( {{$value->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                @endrole
                            </div>
                        </td>
                        <td>
                            <span id = "star-{{ $value->id }}" @if($value->star == 1) class="fa fa-star checked" @else class = "fa fa-star" @endif></span>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                    @endforeach
                    @foreach ($items1 as $key => $value)
                    <tr class="tr-shadow ticked">
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox" class="item-check" id="item-{{ $value->id }}" checked="checked" disabled="disabled">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>{{ $value->title }}</td>
                        
                        <td>{{ $value->duedate }}</td>
                        <td>
                            @if($value->sublist == 1)
                                <a href="{{ route('checklist_items.show', $value->id) }}"><i class="fas fa-list" style="color: #63c76a;float: right;" data-toggle="tooltip" title="Sublist"></i></a>
                            @endif
                        </td>                        
                        <!-- <td></td>                        
                        <td></td> -->
                        <td>
                            <div class="table-data-feature">
                                <a href="{{ route('checklist_items.show', $value->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>                                
                                
                                <a href="{{ route('checklist_items.edit', $value->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button></a>
                                
                                @role('Admin')
                                <button class="item" data-toggle="modal" data-target="#confirm{{$value->id}}" data-backdrop="false">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>

                                

                                <form id="{{$value->id}}" action="" method="POST" style="display: none;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <div class="modal fade" id="confirm{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Under Development
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Task</button>
                                        <a onclick="event.preventDefault(); document.getElementById( {{$value->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                @endrole
                            </div>
                        </td>
                        <td>
                            <span id = "star-{{ $value->id }}" @if($value->star == 1) class="fa fa-star checked" @else class = "fa fa-star" @endif></span>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
<style type="text/css">
    .checked {
        color: orange;
    }
    .ticked {
        text-decoration:line-through;
    }
</style>
<script type="text/javascript">
    $('.fa-star').on('click', function(e){
        //e.target.element.className = 'fa fa-star';
        var item_id = e.target.id;
        if(e.target.className == 'fa fa-star checked')
        {
            $(this).removeClass('fa fa-star checked');
            $(this).addClass('fa fa-star');
            $.get('{{ url('information') }}/unstar/ajax-state?item_id=' + item_id, function(data) {
                console.log(data);
            });
        }
        else
        {
            $(this).removeClass('fa fa-star');
            $(this).addClass('fa fa-star checked');
            $.get('{{ url('information') }}/star/ajax-state?item_id=' + item_id, function(data) {

            });
        }
        console.log(item_id);
    });
    $('.item-check').on('change', function(e){

        var item_id = e.target.id;
        $(this).attr("disabled", true);

        var ru = $(this).closest('.tr-shadow');
        $(ru).addClass('ticked');
        
        $.get('{{ url('information') }}/checklist_item/ajax-state?item_id=' + item_id, function(data) {
            console.log(data);
        });
        
        console.log(item_id);
        console.log(ru);
    });
</script>

@endsection
