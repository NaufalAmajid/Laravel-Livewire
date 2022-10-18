<div>
    {{-- flash message with type array --}}
    @if (session()->has('message'))
        <div class="row mb-3">
            <div class="alert alert-{{ session()->get('message')['type'] }} alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('message')['message'] }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if ($updateMode)
        @livewire('user-update')
    @else
        @livewire('user-create')
    @endif

    <hr>
     <div class="row mt-4 mb-2">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <label for="sort">Sort</label>
                    <select class="form-control sm text-center" wire:model.lazy="sort" id="sort">
                        <option value="asc">A - Z</option>
                        <option value="desc">Z - A</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="sortBy">Sort By</label>
                    <select class="form-control sm text-center" wire:model.lazy="sortBy" id="sortBy">
                        <option value="name">Nama</option>
                        <option value="email">Email</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="perPage">Per Page</label>
                    <select class="form-control sm text-center" wire:model.lazy="perPage" id="perPage">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="search">Search</label>
                    <div class="input-group">
                        <input type="text" class="form-control" wire:model.defer="search" id="search" placeholder="Search">
                        <button class="btn btn-outline-secondary" type="button" wire:click="render">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->gender == 1 ? 'Laki - laki' : 'Perempuan' }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                                <button wire:click="getUser({{ $user->id }})" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
                                &ensp;
                                <button wire:click="destroy({{ $user->id }})" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row justify-content-end">
        {{ $users->links() }}
    </div>
</div>
