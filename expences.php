<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Wallet - Expense Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 ">
    <!-- Main Container -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white border-r border-gray-200 flex flex-col">
            <!-- Logo -->
            <div class="p-6 border-b">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-line text-white text-xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">Smart Wallet</h1>
                </div>
                <p class="text-gray-500 text-sm mt-1">Personal Finance Manager</p>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="index.php"
                            class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-tachometer-alt w-5"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="incomes.php"
                            class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-money-bill-wave w-5"></i>
                            <span>Incomes</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-active flex items-center space-x-3 p-3 rounded-lg">
                            <i class="fas fa-shopping-cart w-5"></i>
                            <span>Expenses</span>
                        </a>
                    </li>
                    <li>
                        <a href="#  "
                            class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-file-export w-5"></i>
                            <span>Reports</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 px-8 py-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Expense Management</h2>
                        <p class="text-gray-600">Track and manage all your expenses</p>
                    </div>
                    <button id="addExpenseBtn"
                        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 flex items-center space-x-2">
                        <i class="fas fa-plus"></i>
                        <span>Add New Expense</span>
                    </button>
                </div>
            </header>

            <!-- Stats Cards -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Total Expenses Card -->
                    <div class="bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-red-100">Total Expenses</p>
                                <h3 id="totalExpenses" class="text-3xl font-bold mt-2">$0.00</h3>
                                <p class="text-red-100 mt-2">All time</p>
                            </div>
                            <div class="w-12 h-12 bg-red-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-receipt text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- This Month Expenses -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500">This Month</p>
                                <h3 id="monthlyExpenses" class="text-3xl font-bold mt-2 text-gray-800">$0.00</h3>
                                <p class="text-red-500 mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span id="monthlyChange">0%</span> from last month
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-blue-600 text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Average Monthly -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500">Average Monthly</p>
                                <h3 id="averageExpenses" class="text-3xl font-bold mt-2 text-gray-800">$0.00</h3>
                                <p class="text-gray-500 mt-2">Based on last 6 months</p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-chart-bar text-purple-600 text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Expenses Table -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-xl font-bold text-gray-800">Expense Records</h3>
                        <p class="text-gray-600 text-sm mt-1">All your expense transactions</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="text-left py-4 px-6 text-gray-700 font-medium">
                                        <button class="flex items-center sortable" data-sort="description">
                                            Description <i class="fas fa-sort ml-2 text-gray-400"></i>
                                        </button>
                                    </th>
                                    <th class="text-left py-4 px-6 text-gray-700 font-medium">
                                        <button class="flex items-center sortable" data-sort="category">
                                            Category <i class="fas fa-sort ml-2 text-gray-400"></i>
                                        </button>
                                    </th>
                                    <th class="text-left py-4 px-6 text-gray-700 font-medium">
                                        <button class="flex items-center sortable" data-sort="amount">
                                            Amount <i class="fas fa-sort ml-2 text-gray-400"></i>
                                        </button>
                                    </th>
                                    <th class="text-left py-4 px-6 text-gray-700 font-medium">
                                        <button class="flex items-center sortable" data-sort="date">
                                            Date <i class="fas fa-sort ml-2 text-gray-400"></i>
                                        </button>
                                    </th>
                                    <th class="text-left py-4 px-6 text-gray-700 font-medium">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="expensesTableBody">
                                <!-- Expenses will be loaded here dynamically -->
                                <tr>
                                    <td colspan="5" class="text-center py-8 text-gray-500" id="noExpensesMessage">
                                        <i class="fas fa-shopping-cart text-4xl text-gray-300 mb-4"></i>
                                        <p class="text-lg">No expense records found</p>
                                        <p class="text-sm mt-1">Click "Add New Expense" to get started</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="p-4 border-t border-gray-200 flex justify-between items-center">
                        <div class="text-gray-600 text-sm">
                            Showing <span id="startRow">0</span> to <span id="endRow">0</span> of <span
                                id="totalRows">0</span> entries
                        </div>
                        <div class="flex space-x-2">
                            <button id="prevPage"
                                class="px-3 py-1 border border-gray-300 rounded-lg disabled:opacity-50" disabled>
                                Previous
                            </button>
                            <div class="flex items-center">
                                <span class="mx-2">Page</span>
                                <input type="number" id="currentPage" value="1" min="1"
                                    class="w-12 text-center border border-gray-300 rounded-lg">
                                <span class="mx-2">of <span id="totalPages">1</span></span>
                            </div>
                            <button id="nextPage"
                                class="px-3 py-1 border border-gray-300 rounded-lg disabled:opacity-50" disabled>
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Expense Modal -->
    <div id="expenseModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl p-6 w-full max-w-md slide-in">
            <div class="flex justify-between items-center mb-6">
                <h3 id="modalTitle" class="text-xl font-bold text-gray-800">Add New Expense</h3>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <form id="expenseForm" class="space-y-4">
                <input type="hidden" id="expenseId">

                <div>
                    <label class="block text-gray-700 mb-2">Description *</label>
                    <input type="text" id="description" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Groceries, Rent, Transportation, etc.">
                    <div id="descriptionError" class="text-red-500 text-sm mt-1 hidden">Description is required</div>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Category *</label>
                    <select id="category" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select Category</option>
                        <option value="food">Food & Dining</option>
                        <option value="housing">Housing & Rent</option>
                        <option value="transportation">Transportation</option>
                        <option value="utilities">Utilities</option>
                        <option value="entertainment">Entertainment</option>
                        <option value="shopping">Shopping</option>
                        <option value="health">Health & Medical</option>
                        <option value="education">Education</option>
                        <option value="other">Other</option>
                    </select>
                    <div id="categoryError" class="text-red-500 text-sm mt-1 hidden">Category is required</div>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Amount *</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-500">$</span>
                        <input type="number" id="amount" step="0.01" min="0" required
                            class="w-full p-3 pl-8 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="0.00">
                    </div>
                    <div id="amountError" class="text-red-500 text-sm mt-1 hidden">Amount must be greater than 0</div>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Date *</label>
                    <input type="date" id="date" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <div id="dateError" class="text-red-500 text-sm mt-1 hidden">Date is required</div>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Payment Method</label>
                    <select id="paymentMethod"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select Method</option>
                        <option value="cash">Cash</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="debit_card">Debit Card</option>
                        <option value="bank_transfer">Bank Transfer</option>
                        <option value="digital_wallet">Digital Wallet</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Notes (Optional)</label>
                    <textarea id="notes" rows="3"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Additional details about this expense"></textarea>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <button type="button" id="cancelBtn"
                        class="px-6 py-3 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" id="submitBtn"
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Save Expense
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Sample data - In real app, this would come from PHP/MySQL
        let expenses = [{
                id: 1,
                description: "Grocery Shopping",
                category: "food",
                amount: 124.50,
                date: "2023-10-15",
                paymentMethod: "credit_card",
                notes: "Weekly groceries"
            },
            {
                id: 2,
                description: "Monthly Rent",
                category: "housing",
                amount: 1200.00,
                date: "2023-10-01",
                paymentMethod: "bank_transfer",
                notes: "Apartment rent"
            },
            {
                id: 3,
                description: "Gasoline",
                category: "transportation",
                amount: 65.00,
                date: "2023-10-14",
                paymentMethod: "debit_card",
                notes: "Full tank"
            },
            {
                id: 4,
                description: "Internet Bill",
                category: "utilities",
                amount: 89.99,
                date: "2023-10-10",
                paymentMethod: "credit_card",
                notes: "Monthly subscription"
            },
            {
                id: 5,
                description: "Movie Tickets",
                category: "entertainment",
                amount: 40.00,
                date: "2023-10-08",
                paymentMethod: "cash",
                notes: "Weekend movie"
            },
            {
                id: 6,
                description: "Gym Membership",
                category: "health",
                amount: 45.00,
                date: "2023-10-01",
                paymentMethod: "credit_card",
                notes: "Monthly fee"
            }
        ];

        // State management
        let currentSort = {
            field: 'date',
            direction: 'desc'
        };
        let currentFilter = {
            category: '',
            month: ''
        };
        let currentSearch = '';
        let currentPage = 1;
        const itemsPerPage = 5;

        // DOM Elements
        const elements = {
            tableBody: document.getElementById('expensesTableBody'),
            noExpensesMessage: document.getElementById('noExpensesMessage'),
            totalExpenses: document.getElementById('totalExpenses'),
            monthlyExpenses: document.getElementById('monthlyExpenses'),
            monthlyChange: document.getElementById('monthlyChange'),
            averageExpenses: document.getElementById('averageExpenses'),
            addExpenseBtn: document.getElementById('addExpenseBtn'),
            expenseModal: document.getElementById('expenseModal'),
            closeModal: document.getElementById('closeModal'),
            cancelBtn: document.getElementById('cancelBtn'),
            expenseForm: document.getElementById('expenseForm'),
            modalTitle: document.getElementById('modalTitle'),
            expenseId: document.getElementById('expenseId'),
            description: document.getElementById('description'),
            category: document.getElementById('category'),
            amount: document.getElementById('amount'),
            date: document.getElementById('date'),
            paymentMethod: document.getElementById('paymentMethod'),
            notes: document.getElementById('notes'),
            sortButtons: document.querySelectorAll('.sortable'),
            prevPage: document.getElementById('prevPage'),
            nextPage: document.getElementById('nextPage'),
            currentPage: document.getElementById('currentPage'),
            totalPages: document.getElementById('totalPages'),
            startRow: document.getElementById('startRow'),
            endRow: document.getElementById('endRow'),
            totalRows: document.getElementById('totalRows')
        };

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            renderTable();
            updateStats();
            setupEventListeners();
            setCurrentDate();
        });

        function setupEventListeners() {
            // Modal controls
            elements.addExpenseBtn.addEventListener('click', () => openModal());
            elements.closeModal.addEventListener('click', () => closeModal());
            elements.cancelBtn.addEventListener('click', () => closeModal());

            // Form submission
            elements.expenseForm.addEventListener('submit', handleSubmit);

            // Sorting
            elements.sortButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const field = button.dataset.sort;
                    toggleSort(field);
                });
            });

            // Pagination
            elements.prevPage.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    renderTable();
                }
            });

            elements.nextPage.addEventListener('click', () => {
                const totalPages = Math.ceil(getFilteredExpenses().length / itemsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    renderTable();
                }
            });

            elements.currentPage.addEventListener('change', (e) => {
                const totalPages = Math.ceil(getFilteredExpenses().length / itemsPerPage);
                const page = Math.max(1, Math.min(totalPages, parseInt(e.target.value) || 1));
                currentPage = page;
                renderTable();
            });

            // Close modal on outside click
            elements.expenseModal.addEventListener('click', (e) => {
                if (e.target === elements.expenseModal) {
                    closeModal();
                }
            });
        }

        function getFilteredExpenses() {
            return expenses.filter(expense => {
                // Apply search filter
                if (currentSearch && !expense.description.toLowerCase().includes(currentSearch)) {
                    return false;
                }

                // Apply category filter
                if (currentFilter.category && expense.category !== currentFilter.category) {
                    return false;
                }

                // Apply month filter
                if (currentFilter.month) {
                    const expenseDate = new Date(expense.date);
                    const expenseMonth =
                        `${expenseDate.getFullYear()}-${String(expenseDate.getMonth() + 1).padStart(2, '0')}`;
                    if (expenseMonth !== currentFilter.month) {
                        return false;
                    }
                }

                return true;
            });
        }

        function getSortedExpenses(filteredExpenses) {
            return filteredExpenses.sort((a, b) => {
                let aVal = a[currentSort.field];
                let bVal = b[currentSort.field];

                // Handle date sorting
                if (currentSort.field === 'date') {
                    aVal = new Date(a.date);
                    bVal = new Date(b.date);
                }

                // Handle numeric sorting
                if (currentSort.field === 'amount') {
                    aVal = parseFloat(a.amount);
                    bVal = parseFloat(b.amount);
                }

                if (currentSort.direction === 'asc') {
                    return aVal > bVal ? 1 : -1;
                } else {
                    return aVal < bVal ? 1 : -1;
                }
            });
        }

        function renderTable() {
            const filteredExpenses = getFilteredExpenses();
            const sortedExpenses = getSortedExpenses(filteredExpenses);
            const totalItems = sortedExpenses.length;
            const totalPages = Math.ceil(totalItems / itemsPerPage);

            // Update pagination
            currentPage = Math.min(currentPage, totalPages || 1);
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, totalItems);
            const pagedExpenses = sortedExpenses.slice(startIndex, endIndex);

            // Update pagination UI
            elements.startRow.textContent = totalItems === 0 ? 0 : startIndex + 1;
            elements.endRow.textContent = endIndex;
            elements.totalRows.textContent = totalItems;
            elements.totalPages.textContent = totalPages || 1;
            elements.currentPage.value = currentPage;
            elements.prevPage.disabled = currentPage === 1;
            elements.nextPage.disabled = currentPage === totalPages || totalPages === 0;

            // Clear table
            elements.tableBody.innerHTML = '';

            if (pagedExpenses.length === 0) {
                elements.noExpensesMessage.classList.remove('hidden');
                return;
            }

            elements.noExpensesMessage.classList.add('hidden');

            // Add rows
            pagedExpenses.forEach(expense => {
                const row = document.createElement('tr');
                row.className = 'border-b border-gray-100 hover:bg-gray-50 fade-in';
                row.innerHTML = `
                        <td class="py-4 px-6">
                            <div>
                                <p class="font-medium text-gray-800">${expense.description}</p>
                                ${expense.notes ? `<p class="text-gray-500 text-sm mt-1">${expense.notes}</p>` : ''}
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-3 py-1 rounded-full text-xs font-medium ${getCategoryClass(expense.category)}">
                                ${getCategoryLabel(expense.category)}
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="font-bold text-red-600">$${expense.amount.toFixed(2)}</span>
                        </td>
                        <td class="py-4 px-6 text-gray-600">
                            ${formatDate(expense.date)}
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex space-x-2">
                                <button onclick="editExpense(${expense.id})" 
                                        class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="deleteExpense(${expense.id})" 
                                        class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-50">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    `;
                elements.tableBody.appendChild(row);
            });
        }

        function updateStats() {
            const now = new Date();
            const currentMonth = now.getMonth();
            const currentYear = now.getFullYear();
            const lastMonth = currentMonth === 0 ? 11 : currentMonth - 1;
            const lastMonthYear = currentMonth === 0 ? currentYear - 1 : currentYear;

            // Calculate totals
            const total = expenses.reduce((sum, expense) => sum + expense.amount, 0);
            const thisMonthTotal = expenses
                .filter(expense => {
                    const date = new Date(expense.date);
                    return date.getMonth() === currentMonth && date.getFullYear() === currentYear;
                })
                .reduce((sum, expense) => sum + expense.amount, 0);

            const lastMonthTotal = expenses
                .filter(expense => {
                    const date = new Date(expense.date);
                    return date.getMonth() === lastMonth && date.getFullYear() === lastMonthYear;
                })
                .reduce((sum, expense) => sum + expense.amount, 0);

            // Calculate average
            const last6Months = expenses
                .filter(expense => {
                    const date = new Date(expense.date);
                    const sixMonthsAgo = new Date();
                    sixMonthsAgo.setMonth(sixMonthsAgo.getMonth() - 6);
                    return date >= sixMonthsAgo;
                });

            const average = last6Months.length > 0 ?
                last6Months.reduce((sum, expense) => sum + expense.amount, 0) / last6Months.length :
                0;

            // Calculate percentage change
            const change = lastMonthTotal > 0 ?
                ((thisMonthTotal - lastMonthTotal) / lastMonthTotal * 100).toFixed(1) :
                '0';

            // Update UI
            elements.totalExpenses.textContent = `$${total.toFixed(2)}`;
            elements.monthlyExpenses.textContent = `$${thisMonthTotal.toFixed(2)}`;
            elements.monthlyChange.textContent = `${change}%`;
            elements.averageExpenses.textContent = `$${average.toFixed(2)}`;
        }

        function openModal(expenseId = null) {
            elements.modalTitle.textContent = expenseId ? 'Edit Expense' : 'Add New Expense';
            elements.submitBtn.textContent = expenseId ? 'Update Expense' : 'Save Expense';

            if (expenseId) {
                const expense = expenses.find(e => e.id === expenseId);
                if (expense) {
                    elements.expenseId.value = expense.id;
                    elements.description.value = expense.description;
                    elements.category.value = expense.category;
                    elements.amount.value = expense.amount;
                    elements.date.value = expense.date;
                    elements.paymentMethod.value = expense.paymentMethod || '';
                    elements.notes.value = expense.notes || '';
                }
            } else {
                elements.expenseForm.reset();
                elements.expenseId.value = '';
            }

            // Clear errors
            clearErrors();
            elements.expenseModal.classList.remove('hidden');
        }

        function closeModal() {
            elements.expenseModal.classList.add('hidden');
            elements.expenseForm.reset();
            clearErrors();
        }

        function handleSubmit(e) {
            e.preventDefault();

            if (!validateForm()) {
                return;
            }

            const expenseData = {
                id: elements.expenseId.value ? parseInt(elements.expenseId.value) : generateId(),
                description: elements.description.value.trim(),
                category: elements.category.value,
                amount: parseFloat(elements.amount.value),
                date: elements.date.value,
                paymentMethod: elements.paymentMethod.value,
                notes: elements.notes.value.trim()
            };

            if (elements.expenseId.value) {
                // Update existing expense
                const index = expenses.findIndex(e => e.id === parseInt(elements.expenseId.value));
                if (index !== -1) {
                    expenses[index] = expenseData;
                    showSuccess('Expense updated successfully!');
                }
            } else {
                // Add new expense
                expenses.push(expenseData);
                showSuccess('Expense added successfully!');
            }

            closeModal();
            renderTable();
            updateStats();
        }

        function validateForm() {
            let isValid = true;
            clearErrors();

            // Description validation
            if (!elements.description.value.trim()) {
                document.getElementById('descriptionError').classList.remove('hidden');
                elements.description.classList.add('border-red-500');
                isValid = false;
            }

            // Category validation
            if (!elements.category.value) {
                document.getElementById('categoryError').classList.remove('hidden');
                elements.category.classList.add('border-red-500');
                isValid = false;
            }

            // Amount validation
            const amount = parseFloat(elements.amount.value);
            if (!amount || amount <= 0) {
                document.getElementById('amountError').classList.remove('hidden');
                elements.amount.classList.add('border-red-500');
                isValid = false;
            }

            // Date validation
            if (!elements.date.value) {
                document.getElementById('dateError').classList.remove('hidden');
                elements.date.classList.add('border-red-500');
                isValid = false;
            }

            return isValid;
        }

        function clearErrors() {
            const errorElements = ['descriptionError', 'categoryError', 'amountError', 'dateError'];
            const inputElements = ['description', 'category', 'amount', 'date'];

            errorElements.forEach(id => {
                const element = document.getElementById(id);
                if (element) element.classList.add('hidden');
            });

            inputElements.forEach(id => {
                const element = document.getElementById(id);
                if (element) element.classList.remove('border-red-500');
            });
        }

        function editExpense(id) {
            openModal(id);
        }

        function deleteExpense(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This expense record will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const index = expenses.findIndex(e => e.id === id);
                    if (index !== -1) {
                        expenses.splice(index, 1);
                        renderTable();
                        updateStats();
                        showSuccess('Expense deleted successfully!');
                    }
                }
            });
        }

        function toggleSort(field) {
            if (currentSort.field === field) {
                currentSort.direction = currentSort.direction === 'asc' ? 'desc' : 'asc';
            } else {
                currentSort.field = field;
                currentSort.direction = 'desc';
            }
            renderTable();
        }

        function setCurrentDate() {
            const today = new Date().toISOString().split('T')[0];
            elements.date.value = today;
        }

        function generateId() {
            return expenses.length > 0 ? Math.max(...expenses.map(e => e.id)) + 1 : 1;
        }

        function getCategoryClass(category) {
            const classes = {
                food: 'bg-red-100 text-red-800',
                housing: 'bg-blue-100 text-blue-800',
                transportation: 'bg-green-100 text-green-800',
                utilities: 'bg-yellow-100 text-yellow-800',
                entertainment: 'bg-purple-100 text-purple-800',
                shopping: 'bg-pink-100 text-pink-800',
                health: 'bg-indigo-100 text-indigo-800',
                education: 'bg-teal-100 text-teal-800',
                other: 'bg-gray-100 text-gray-800'
            };
            return classes[category] || 'bg-gray-100 text-gray-800';
        }

        function getCategoryLabel(category) {
            const labels = {
                food: 'Food & Dining',
                housing: 'Housing',
                transportation: 'Transportation',
                utilities: 'Utilities',
                entertainment: 'Entertainment',
                shopping: 'Shopping',
                health: 'Health',
                education: 'Education',
                other: 'Other'
            };
            return labels[category] || 'Other';
        }

        function formatDate(dateString) {
            const options = {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            };
            return new Date(dateString).toLocaleDateString('en-US', options);
        }

        function showSuccess(message) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: message,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        }
    </script>
</body>
</html>