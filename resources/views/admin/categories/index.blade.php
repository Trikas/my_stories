@extends('admin.layouts.app-admin')

@section('content')
   <div class="container">
      @component('admin.components.breadcrumb')
         @slot('title') Список категорий @endslot
         @slot('parent') Главная @endslot
         @slot('active') Категории @endslot
      @endcomponent
      <hr>
      <a href="{{url('admin.category.create')}}" class="btn btn-primary float-right"> <i class="fas fa-plus"></i> Создать категорию</a>
      <table class="table table-striped">
         <thead>
            <th>Найменовние</th>
            <th>Публикация</th>
            <th class="text-right">Действие</th>
         </thead>
         <tbody>
            @forelse($categories as $category)
               <tr>
                  <td>{{$category->title}}</td>
                  <td>{{$category->published}}</td>
                  <td>
                     <a href="{{route('admin.category.edit', ['id'=>$category->id])}}"><i class="fas fa-edit"></i></a>
                  </td>
               </tr>
            @empty
            <tr>
               <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
            </tr>
            @endforelse
         </tbody>
         <tfoot>
            <tr>
               <td colspan="3">
                  <ul class="pagination float-right">
                     {{$categories->links()}}
                  </ul>
               </td>
            </tr>
         </tfoot>
      </table>
   </div>
@endsection
