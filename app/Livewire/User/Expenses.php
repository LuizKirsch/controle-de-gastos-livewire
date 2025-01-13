<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Expense;

class Expenses extends Component
{
    public $expenses; // Para armazenar os gastos
    public $name, $amount, $description, $payment_method, $date, $category; // Para armazenar dados do novo gasto
    public $isModalOpen = false; // Para controlar se o modal está aberto ou fechado

    // Método que carrega os gastos do usuário
    public function mount()
    {
        $this->expenses = Expense::where('user_id', auth()->id())->get();
    }

    // Método para abrir o modal
    public function openModal()
    {
        $this->resetForm(); // Limpa o formulário
        $this->isModalOpen = true;
    }

    // Método para fechar o modal
    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    // Método para criar um novo gasto
    public function createExpense()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric', // O campo de amount será validado como numérico
            'payment_method' => 'required|string',
            'date' => 'required|date',
            'category' => 'nullable|string|max:255',
        ]);

        // Converte vírgula para ponto se o usuário digitar um número com vírgula
        $this->amount = str_replace(',', '.', $this->amount);

        Expense::create([
            'name' => $this->name,
            'amount' => $this->amount,
            'description' => $this->description,
            'user_id' => auth()->id(),
            'payment_method' => $this->payment_method,
            'date' => $this->date,
            'category' => $this->category,
        ]);

        // Atualiza a lista de gastos
        $this->expenses = Expense::where('user_id', auth()->id())->get();

        // Fecha o modal
        $this->closeModal();
    }

    // Método para resetar os campos do formulário
    public function resetForm()
    {
        $this->name = '';
        $this->amount = '';
        $this->description = '';
        $this->payment_method = '';
        $this->date = '';
        $this->category = '';
    }

    public function render()
    {
        return view('livewire.user.expenses');
    }
}
