<div class="overflow-x-auto w-11/12 mx-auto mt-5 bg-white shadow-lg rounded-lg p-5">
    <table class="table">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $statuses->where('id', $user->user_status)->first()->name }}</td>
                    <td>
                        <button class="btn bg-blue-700 hover:bg-blue-800 text-white"
                            onclick="document.getElementById('viewModal{{ $user->id }}').showModal()">View</button>
                    </td>
                </tr>

                <dialog id="viewModal{{ $user->id }}" class="modal">
                    <div class="modal-box w-11/12 max-w-5xl">
                        <div class="flex items-center gap-2">
                            <button onclick="document.getElementById('viewModal{{ $user->id }}').close()"
                                class="btn bg-blue-700 hover:bg-blue-800 text-white">
                                <i class='bx bx-left-arrow-alt'></i>
                            </button>
                            <h3 class="text-lg font-bold">Service Provider Information</h3>
                        </div>
                        <hr class="my-4">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label class="input input-bordered flex items-center gap-2 font-semibold">
                                    Full Name:
                                    <input type="text" class="grow border-none font-normal" placeholder="Full Name"
                                        value="{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}"
                                        readonly />
                                </label>
                            </div>
                            <div class="sm:col-span-3">
                                <label class="input input-bordered flex items-center gap-2 font-semibold">
                                    Birthdate:
                                    <input type="text"
                                        class="grow border-none active:border-none focus:border-none font-normal"
                                        placeholder="Birthdate" value="{{ $user->birth_date }}" readonly />
                                </label>
                            </div>
                        </div>
                        <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label class="input input-bordered flex items-center gap-2 font-semibold">
                                    Contact Number:
                                    <input type="text"
                                        class="grow border-none active:border-none focus:border-none font-normal"
                                        placeholder="Contact Number" value="{{ $user->cp_number }}" readonly />
                                </label>
                            </div>
                            <div class="sm:col-span-3">
                                <label class="input input-bordered flex items-center gap-2 font-semibold">
                                    Email:
                                    <input type="text"
                                        class="grow border-none active:border-none focus:border-none font-normal"
                                        placeholder="Email" value="{{ $user->email }}" readonly />
                                </label>
                            </div>
                        </div>
                        <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label class="input input-bordered flex items-center gap-2 font-semibold">
                                    Skills:
                                    <input type="text"
                                        class="grow border-none active:border-none focus:border-none font-normal"
                                        placeholder="Skills" value="{{ $user->skills }}" readonly />
                                </label>
                            </div>
                            <div class="sm:col-span-3">
                                <label class="input input-bordered flex items-center gap-2 font-semibold">
                                    Region:
                                    <input type="text"
                                        class="grow border-none active:border-none focus:border-none font-normal"
                                        placeholder="Region" value="{{ $user->region }}" readonly />
                                </label>
                            </div>
                        </div>
                        <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <span class="text-lg font-semibold">Valid ID:</span>
                                <img src="{{ asset($user->valid_id) }}" alt="Valid ID" class="w-full">
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="modal-action">
                            <form action="{{ route('admin_sp_status_update', $user->id) }}" method="POST"
                                class="flex items-center gap-2" id="statusForm{{ $user->id }}">
                                @csrf
                                <select name="status" class="p-2 rounded-md border-gray-300 shadow-sm w-[10rem]"
                                    onchange="document.getElementById('statusForm{{ $user->id }}').submit()">
                                    <option class="text-gray-500" value="{{ $user->user_status }}" selected readonly>
                                        Status
                                    </option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}"
                                            {{ $user->user_status == $status->id ? 'selected' : '' }}>
                                            {{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </form>
                            <form method="dialog">
                                <button class="btn bg-red-700 hover:bg-red-800 text-white"
                                    onclick="document.getElementById('viewModal{{ $user->id }}').close()">Close</button>
                            </form>
                        </div>
                    </div>
                </dialog>
            @endforeach
        </tbody>
    </table>
</div>