<div class="row">
    <div class="col-sm-12 mt-3">
         @include('messages.alert')  
    </div>
    <div class="col-sm-12 admin-content">         
        <a href="{{ route('products.add_comment', $product->id) }}"><button type="button" class="btn-add btn btn-success">{{ __('add_new_comment') }}</button></a>
        <button type="button" class="btn_go_back btn btn-danger" >{{ __('go_back') }}</button> 
        <!--Table of Products-->
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="font-weight-bold">
                    <td>{{ __('serial') }}</td>
                    <td>{{ __('user') }}</td>                                        
                    <td class="th-50">{{ __('content') }}</td>
                    <td>{{ __('action') }}</td>
                <tr>
            <thead>
            <tbody>
                @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->content }}</td>                    
                    <td>
                        <form id="delete_comment_{{ $comment->id }}" action="{{ route('comments.destroy', $comment->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" data-id="{{ $comment->id }}" data-delete_msg="{{ __('delete_msg') }}" class="btn_delete_comment btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $comments->links() }}
    </div>
</div>
