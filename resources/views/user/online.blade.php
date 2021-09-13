@extends('mainlayots.master2')



@section('title')
{{ __("All Users") }}
@endsection

@section('content')
<div class="flex flex-col py-10 bg-black">
    <div class="overflow-x-auto ">
      <div class="py-2 align-middle inline-block min-w-full ">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class=" min-w-full divide-y  divide-x divide-gray-200 bg-black">
            <thead class="bg-blue-800 text-red-500">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-red-500 uppercase tracking-wider">
                  ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-red-500 uppercase tracking-wider">
                  Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-red-500 uppercase tracking-wider">
                  Description
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-red-500 uppercase tracking-wider">
                  Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-red-500 uppercase tracking-wider">
                    Last Seen
                </th>

                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">go chat</span>
                </th>

                @if (Auth::user()->role != 'user')
                <th scope="col" class="relative px-6 py-3">
                  <span class="">Edit</span>
                </th>
                @endif

              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                @if(Cache::has('user-is-online-' . $user->id))

              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                   {{ $user->id }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <img class="h-10 w-10 rounded-full" src="{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}" alt="">
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ $user->first_name.' '.$user->middle_name }}
                      </div>
                      <div class="text-sm text-gray-500">
                        {{ $user->email }}
                      </div>
                    </div>

                  </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-500"> {{ $user->preference }}</div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                @if(Cache::has('user-is-online-' . $user->id))
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Online
                      </span>
                @else
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-600">
                    Offline
                  </span>
                @endif
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                @if($user->last_seen != null)
                    {{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                @else
                     {{ __('Demo User') }}
                @endif
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    {{-- for privte chat --}}
                    @if ($user->role != 'admin')
                    <a href="{{ route('user' ,$user->id )  }}" class="text-indigo-600 hover:text-indigo-900">Privte Chat</a>
                    @else
                    {{ __('Demo User') }}
                     @endif
                </td>

                @if (Auth::user()->role != 'user')
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="{{ route('user.edit') }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                </td>
                @endif
              </tr>
              @endif
              @endforeach
              <!-- More people... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
