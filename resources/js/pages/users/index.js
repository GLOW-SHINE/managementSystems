import { getUsers } from '../../api/users';

async function loadUsers() {
    try {
        const response = await getUsers();

        console.log('Users API Response:', response);

    } catch (error) {
        console.error('Users API Error:', error);
    }
}

loadUsers();