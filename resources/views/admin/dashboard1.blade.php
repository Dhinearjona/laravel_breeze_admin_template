<x-app-layout>
    @include('layouts.navbar', [
        'name' => 'Dashboard 1',
        'link' => route('admin_dashboard_1'),
    ])

    <div class="overflow-x-auto w-11/12 mx-auto mt-5 bg-white shadow-lg rounded-lg p-5">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Percentage</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($maintenance_fees as $maintenance_fee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $maintenance_fee->name}}</td>
                        <td>{{ $maintenance_fee->amount}}</td>
                        <td>{{ $maintenance_fee->percentage}}</td>
                        <td class="flex items-center">
                            <button class="btn bg-green-700 text-white hover:bg-green-800"
                                onclick="viewModal{{ $maintenance_fee->id }}.showModal()">View</button>
                        </td>
                    </tr>

                    <!-- View Modal -->
                    <dialog id="viewModal{{ $maintenance_fee->id }}" class="modal">
                        <div class="modal-box w-11/12 max-w-5xl">
                            <h3 class="text-lg font-bold">View Maintenance Fee</h3>
                            <hr class="my-4">
                            <div class="flex flex-col gap-4">
                                <div class="sm:col-span-3">
                                    <label class="input input-bordered flex items-center gap-2 font-semibold">
                                        Name:
                                        <input type="text"
                                            class="grow border-none active:border-none focus:border-none font-normal"
                                            placeholder="Name" value="{{ $maintenance_fee->name }}" readonly />
                                    </label>
                                </div>
                                <div class="sm:col-span-3">
                                    <label class="input input-bordered flex items-center gap-2 font-semibold">
                                        Amount:
                                        <input type="text"
                                            class="grow border-none active:border-none focus:border-none font-normal"
                                            placeholder="Amount" value="{{ $maintenance_fee->amount }}" readonly />
                                    </label>
                                </div>
                                <div class="sm:col-span-3">
                                    <label class="input input-bordered flex items-center gap-2 font-semibold">
                                        Percentage:
                                        <input type="text"
                                            class="grow border-none active:border-none focus:border-none font-normal"
                                            placeholder="Percentage" value="{{ $maintenance_fee->percentage }}"
                                            readonly />
                                    </label>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="modal-action">
                                <button class="btn bg-red-700 text-white hover:bg-red-800" type="button"
                                    onclick="viewModal{{ $maintenance_fee->id }}.close()">Close</button>
                            </div>
                        </div>
                    </dialog>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
