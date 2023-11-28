import moment from 'moment'
import { type FinancialTransaction } from '@/Pages/FinancialTransaction/FinancialTransactionInterface'

export const FinancialTransactionMock: FinancialTransaction = {
  id: 1,
  transaction_type: 'DEPOSIT',
  amount: 0,
  transaction_date: moment().format('YYYY-MM-DD')
}

export const FinancialTransactionConstruct: FinancialTransaction = (
  id: number,
  amount: number,
  transactionDate: string,
  transactionType: 'DEPOSIT' | 'WITHDRAW'
) => {
  return {
    id,
    amount,
    transaction_date: transactionDate,
    transaction_type: transactionType
  }
}
