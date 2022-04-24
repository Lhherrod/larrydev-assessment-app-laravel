<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@if($userAdminStatus == $adminStatus) 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    VIP access only...You are not the admin...The Don...
                </div>
            </div>
        </div>
    </div>
@else

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">

                    @foreach ($users as $user )
                       
                            <table>
                                <tr>
                                    <td>Username: {{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        Check In Status :
                                        {{ $user->assessmentCheckInStatus }}
                                        <form  method="POST" action="{{ route('users.update', $user->username) }}">
                                            @csrf
                                            @method('patch')
                                            <select name="assessmentCheckInStatus" id="">
                                                <option 
                                                    value="1"
                                                    <?php if($user->assessmentCheckInStatus == "1") echo 'selected="selected"'; ?>>
                                                    1
                                                </option>
                                                <option 
                                                    value="0"
                                                    <?php if($user->assessmentCheckInStatus == "0") echo 'selected="selected"'; ?>>
                                                    0
                                                </option>
                                            </select>
                                            <x-button type="submit" class="mt-4">
                                                {{ __('Change') }}
                                            </x-button>
                                        </form>
                                    
                                    </td>
                                </tr>

                                <tr class="mt-4">
                                    <td>
                                        assessmentStatus :
                                        {{ $user->assessmentStatus}}
                                        <form  method="POST" action="{{ route('users.update', $user->username) }}">
                                            @csrf
                                            @method('put')
                                            <select name="assessmentStatus" id="">
                                                <option 
                                                value="1"
                                                <?php if($user->assessmentStatus != $assessmentStatus) echo 'selected="selected"'; ?>>
                                                    1
                                                </option>
                                                <option 
                                                value="0"
                                                <?php if($user->assessmentStatus == $assessmentStatus) echo 'selected="selected"'; ?>>
                                                    0
                                                </option>
                                            </select>
                                            <x-button type="submit" class="mt-4">
                                                {{ __('Change') }}
                                            </x-button>
                                        </form>
                                    
                                    </td>
                                <tr>
                               
                            </table>
                       
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


@endif