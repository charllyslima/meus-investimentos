import moment from 'moment'
import { type IFinancialTransaction } from '@/Pages/FinancialTransaction/FinancialTransactionInterface'

export const FinancialTransactionMock: IFinancialTransaction = {
    id: 1,
    transaction_type: 'DEPOSIT',
    amount: 0,
    transaction_date: moment().format('YYYY-MM-DD')
}

export const FinancialTransactionConstruct = (
    id: number,
    amount: number,
    transaction_type: 'DEPOSIT' | 'WITHDRAW',
    transaction_date: string
): IFinancialTransaction => {
    return {
        id,
        amount,
        transaction_type,
        transaction_date
    };
};
