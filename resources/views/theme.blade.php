<x-app-layout>

    <body class="bg-white text-black">
        <div class="flex justify-center items-center h-screen">
            <div class="relative inline-block">
                <button id="dropdownButton" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Select Theme
                </button>
                <ul id="dropdownMenu" class="hidden absolute bg-white shadow-md rounded mt-1 w-40">
                    <li class="px-4 py-2 cursor-pointer hover:bg-gray-100" data-theme="light">Light</li>
                    <li class="px-4 py-2 cursor-pointer hover:bg-gray-100" data-theme="dark">Dark</li>
                    <li class="px-4 py-2 cursor-pointer hover:bg-gray-100" data-theme="system">System</li>
                </ul>
            </div>
        </div>
</x-app-layout>

<script>
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    // Toggle dropdown visibility
    dropdownButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });

    // Apply and save selected theme
    dropdownMenu.addEventListener('click', (e) => {
        if (e.target.tagName === 'LI') {
            const selectedTheme = e.target.getAttribute('data-theme');
            document.body.setAttribute('data-theme', selectedTheme);

            // Update Tailwind theme classes
            document.body.className = selectedTheme === 'dark' ?
                'bg-black text-white' :
                'bg-white text-black';

            localStorage.setItem('theme', selectedTheme);
            dropdownMenu.classList.add('hidden'); // Close the dropdown
        }
    });

    // Load saved theme on page load
    const savedTheme = localStorage.getItem('theme') || 'system';
    document.body.setAttribute('data-theme', savedTheme);
    document.body.className = savedTheme === 'dark' ?
        'bg-black text-white' :
        'bg-white text-black';
</script>
