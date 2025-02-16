<x-app-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-400">
            <thead class="text-xs text-gray-400 uppercase bg-gray-700 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Account name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Balance
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr class=" border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4 whitespace-nowrap text-gray-100 sm:text-lg">
                            {{ $account->name }}
                        </td>
                        <td scope="row" class="px-6 py-4 whitespace-nowrap text-gray-100 sm:text-lg">
                            Rs. {{ $account->balance }}
                        </td>
                        <td class="px-6 py-4 text-left">
                            <a href="{{ route('accounts.edit', $account->id) }}">
                                <i
                                    class="fa fa-pencil shrink-0 w-5 h-5 transition duration-75 text-gray-300 group-hover:text-white mx-1 mt-1"></i>
                            </a>
                            <form action="{{ route('accounts.destroy', $account->id) }}" method="POST"
                                class="inline-flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">
                                    <i
                                        class="fa fa-trash shrink-0 w-5 h-5 transition duration-75 text-gray-300 group-hover:text-white mx-1 mt-1"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <x-nav-link url="{{ route('accounts.create') }}" class="mt-4 text-center bg-blue-800 hover:bg-blue-700"
        icon="">Add New
        Account</x-nav-link>
</x-app-layout>
