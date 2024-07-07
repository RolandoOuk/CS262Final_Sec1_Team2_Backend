document.addEventListener('DOMContentLoaded', () => {
    const users = [
        { lastName: 'Marshall', firstName: 'Melissa', id: 'demo@warpwire.net', assets: 8, creationDate: 'August 21, 2019 @ 1:01pm' },
        { lastName: 'James', firstName: 'Jacquine', id: 'test10@warpwire.net', assets: 0, creationDate: 'August 21, 2019 @ 12:59pm' },
        { lastName: 'Isle', firstName: 'Issac', id: 'test9@warpwire.net', assets: 0, creationDate: 'August 21, 2019 @ 12:57pm' },
        { lastName: 'Hamilton', firstName: 'Harry', id: 'test8@warpwire.net', assets: 0, creationDate: 'August 21, 2019 @ 12:55pm' },
        { lastName: 'Garcia', firstName: 'Gabreil', id: 'test6@warpwire.net', assets: 0, creationDate: 'August 21, 2019 @ 12:53pm' },
        { lastName: 'Francis', firstName: 'Frank', id: 'test7@warpwire.net', assets: 0, creationDate: 'August 21, 2019 @ 12:51pm' },
        { lastName: 'Evans', firstName: 'Erika', id: 'test5@warpwire.net', assets: 0, creationDate: 'August 21, 2019 @ 12:49pm' },
        { lastName: 'Dennis', firstName: 'David', id: 'test4@warpwire.net', assets: 0, creationDate: 'August 21, 2019 @ 12:47pm' }
    ];

    const tableBody = document.querySelector('.user-table tbody');

    users.forEach(user => {
        const row = document.createElement('tr');

        row.innerHTML = `
            <td>${user.lastName}</td>
            <td>${user.firstName}</td>
            <td>${user.id}</td>
            <td>${user.assets}</td>
            <td>${user.creationDate}</td>
            <td><a href="#" class="link">Groups</a></td>
            <td><a href="#" class="link">Edit User</a></td>
        `;

        tableBody.appendChild(row);
    });

    document.getElementById('addUser').addEventListener('click', () => {
        alert('Add User button clicked');
        // Add user functionality here
    });

    document.getElementById('exportList').addEventListener('click', () => {
        alert('Export List button clicked');
        // Export list functionality here
    });
});
