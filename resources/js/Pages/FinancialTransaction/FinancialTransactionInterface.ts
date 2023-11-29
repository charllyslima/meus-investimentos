export interface IFinancialTransaction {
  id: number
  amount: number
  transaction_type: 'DEPOSIT' | 'WITHDRAW'
  transaction_date: string
}
