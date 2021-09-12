@extends('mainlayots.master2')

@section('title')
 {{ __("Update Settings") }}
@endsection

@section('content')
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white shadow overflow-hidden sm:rounded-lg">

    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg leading-6 capitalize text-center font-medium text-gray-900">
       {{ $user->first_name.' '.$user->middle_name }}
      </h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">
        {{ __('Update Personal details') }}
      </p>
    </div>

    <div class="border-t border-gray-200">
      <dl>

        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Username
          </dt>

         <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <form class="" action="{{ route('user.updateUsername') }}" method="post">
            @csrf
                <div class="mt-1 relative rounded-md shadow-sm">
                <input type="text" name="username" id="username" class="focus:ring-indigo-500 focus:border-indigo-500  w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="{{ $user->username }}">

                <div class="absolute inset-y-0 right-0 flex items-center">
                    <button type="submit" onclick="" class="focus:ring-indigo-500 focus:border-indigo-500 text-center h-full py-0 pl-2  px-3  border border-red-900 bg-blue-900 text-white hover:bg-indigo-700 sm:text-sm rounded-md">
                   Update
                </button>
                </div>
                </div>
            </form>
         </dd>
        </div>

        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              Description
            </dt>
           <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <form class="" action="{{ route('user.updateBio') }}" method="post">
              @csrf
                  <div class="mt-1 relative rounded-md shadow-sm">
                  <input type="text" name="preference" id="preference" class="focus:ring-indigo-500 focus:border-indigo-500  w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="{{ $user->preference }}">

                  <div class="absolute inset-y-0 right-0 flex items-center">
                      <button type="submit" onclick="" class="focus:ring-indigo-500 focus:border-indigo-500 text-center h-full py-0 pl-2 px-3  border border-red-900 bg-blue-900 text-white hover:bg-indigo-700 sm:text-sm rounded-md">
                        Update
                    </button>
                  </div>
                  </div>
              </form>
           </dd>
          </div>

        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              E-Mail Address
            </dt>
           <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <form class="" action="{{ route('user.updateEmail') }}" method="post">
              @csrf
                  <div class="mt-1 relative rounded-md shadow-sm">
                  <input type="email" name="email" id="email" class="focus:ring-indigo-500 focus:border-indigo-500  w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="{{ $user->email }}">

                  <div class="absolute inset-y-0 right-0 flex items-center">
                      <button type="submit" onclick="" class="focus:ring-indigo-500 focus:border-indigo-500 text-center h-full py-0 pl-2 px-3  border border-red-900 bg-blue-900 text-white hover:bg-indigo-700 sm:text-sm rounded-md">
                        Update
                    </button>
                  </div>
                  </div>
              </form>
           </dd>
        </div>

        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              Password
            </dt>

           <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <form class="" action="{{ route('user.updatePassword') }}" method="post">
              @csrf

                  <div class="mt-1 relative rounded-md shadow-sm">
                  <input type="password" name="password" id="password" class="focus:ring-indigo-500 focus:border-indigo-500  w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="New Password" >

                  <input type="password"  name="password_confirmation" id="password-confirm" class="focus:ring-indigo-500 focus:border-indigo-500  w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="ReType New Password" >

                  <div class="absolute inset-y-0 right-0 flex items-center">
                      <button type="submit" onclick="" class="focus:ring-indigo-500 focus:border-indigo-500 text-center h-full py-0 pl-2 px-3  border border-red-900 bg-blue-900 text-white hover:bg-indigo-700 sm:text-sm rounded-md">
                        Update
                    </button>
                  </div>
                  </div>
              </form>
           </dd>
        </div>




        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              Contry
            </dt>
           <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <form class="" action="{{ route('user.updateUserCountry') }}" method="post">
              @csrf
                  <div class="mt-1 relative rounded-md shadow-sm">


                    <div class="autocomplete border-danger ">
                        <select
                        class="focus:ring-indigo-500 focus:border-indigo-500  w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                         name="country" >
                            <option selected>{{ $user->country }}</option>

                            @foreach ($countries as $country)
                                <option :value="{{$country->code}}">

                                 {{$country->name}} - {{$country->code}}
                                </option>
                            @endforeach
                        </select>
                     </div>

                    <div class="absolute inset-y-0 left-0 flex items-center">
                        <img src="https://www.countryflags.io/{{ $country->code }}/shiny/64.png"
                        class="flex-shrink-0 h-6 w-6 rounded-full">
                    </div>

                  <div class="absolute inset-y-0 right-0 flex items-center">
                      <button type="submit" onclick="" class="focus:ring-indigo-500 focus:border-indigo-500 text-center h-full py-0 pl-2 px-3  border border-red-900 bg-blue-900 text-white hover:bg-indigo-700 sm:text-sm rounded-md">
                        Update
                    </button>
                  </div>
                  </div>
              </form>
           </dd>
        </div>


        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            About
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.
          </dd>
        </div>

      </dl>
    </div>
  </div>
@endsection
