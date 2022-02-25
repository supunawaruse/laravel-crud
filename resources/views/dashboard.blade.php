<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome... <b>{{Auth::user()->name}}</b>
            <b style="float: right" >Total Users <span class="badge  bg-secondary">{{count($users)}}</span> </b>
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                  <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                  </tr>
                @endforeach

                </tbody>
              </table>
        </div>
    </div>
</x-app-layout>
