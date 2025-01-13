<div>
    <!-- Button to open modal -->
    <button class="btn btn-primary mb-4" wire:click="openModal">Add Expense</button>

    <!-- List of expenses -->
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered shadow-lg rounded-lg">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Description</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Date</th>
                    <th scope="col">Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                    <tr class="bg-light hover:bg-gray-100 transition duration-200">
                        <td>{{ $expense->name }}</td>
                        <td>{{ $expense->amount }}</td>
                        <td>{{ $expense->description }}</td>
                        <td>{{ $expense->payment_method }}</td>
                        <td>{{ $expense->date }}</td>
                        <td>{{ $expense->category }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal for creating expense -->
    @if($isModalOpen)
        <div class="fixed inset-0 bg-gray-800 bg-opacity-50 z-50 flex justify-center items-center" wire:click="closeModal">
            <div class="bg-white rounded-lg w-96" wire:click.prevent>
                <div class="flex justify-between items-center p-4 border-b">
                    <h5 class="text-xl font-semibold" id="exampleModalLongTitle">Create Expense</h5>
                    <button type="button" class="text-gray-500 hover:text-gray-700" wire:click="closeModal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="p-4">
                    <form wire:submit.prevent="createExpense">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" wire:model="name" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" id="amount" wire:model="amount" required
                                   oninput="this.value = this.value.replace(',', '.')" placeholder="Enter amount">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" wire:model="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <select class="form-control" id="payment_method" wire:model="payment_method" required>
                                <option value="" disabled selected>Escolha uma opção</option>
                                <option value="cash">Cash</option>
                                <option value="card">Card</option>
                                <option value="pix">Pix</option>
                                <option value="invoice">Invoice</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" wire:model="date" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" wire:model="category">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
