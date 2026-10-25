@extends('layouts.admin.app')

@section('title', 'All Users')

@section('content')

<div class="card">
<div class="card-header">
    <h3 class="card-title">All Users</h3>
</div>

<div class="card-body">

    <div class="table-responsive">

        <table class="table table-bordered table-striped" id="usersTable">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody id="users-table-body">
                <tr>
                    <td colspan="7" class="text-center">
                        Loading...
                    </td>
                </tr>
            </tbody>

        </table>

    </div>

</div>
```

</div>









<script>
document.addEventListener('DOMContentLoaded', async () => {

    const tbody = document.getElementById('users-table-body');

    try {

        const response = await fetch('/api/users', {
            headers: {
                'Accept': 'application/json'
            }
        });

        const result = await response.json();

        const users = result.data ?? [];

        if (users.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="7" class="text-center">
                        No users found
                    </td>
                </tr>
            `;
            return;
        }

        tbody.innerHTML = users.map(user => `
            <tr>
                <td>${user.id ?? ''}</td>
                <td>${user.name ?? ''}</td>
                <td>${user.email ?? ''}</td>
                <td>${user.username ?? ''}</td>
                <td>${user.type ?? ''}</td>
                <td>${user.status ?? ''}</td>
                <td>
                    <button class="btn btn-sm btn-primary">
                        Edit
                    </button>

                    <button class="btn btn-sm btn-danger">
                        Delete
                    </button>
                </td>
            </tr>
        `).join('');

    } catch (error) {

        console.error(error);

        tbody.innerHTML = `
            <tr>
                <td colspan="7" class="text-center text-danger">
                    Failed to load users
                </td>
            </tr>
        `;
    }

});
</script>




@endsection
