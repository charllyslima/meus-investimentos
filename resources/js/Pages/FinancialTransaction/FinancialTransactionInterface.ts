export interface FinancialTransaction {
  id: number
  amount: number
  transaction_type: 'DEPOSIT' | 'WITHDRAW'
  transaction_date: string
}

export interface FinancialTransactionForm {
  amount: number
  transaction_type: string
  transaction_date: string
  errors: {
    amount: number
    transaction_type: string
    transaction_date: string
  }
}
