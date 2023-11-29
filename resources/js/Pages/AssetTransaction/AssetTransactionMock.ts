import moment from 'moment/moment'
import { IAssetTransaction } from '@/Pages/AssetTransaction/AssetTransactionInterface'

export const AssetTransactionMock: IAssetTransaction = {
    id: 0,
    fi_asset: {
        id: 0,
        acronym: '',
        fundName: '',
        companyName: '',
        type: 'FII',
        segment: ''
    },
    stock_asset: {
        id: 0,
        codeCVM: '',
        issuingCompany: '',
        companyName: '',
        tradingName: '',
        cnpj: '',
        marketIndicator: '',
        typeBDR: '',
        dateListing: '',
        status: '',
        segment: '',
        segmentEng: '',
        type: '',
    },
    asset_code: '',
    transaction_type: '',
    quantity: 0,
    price: 0,
    transaction_date: '',
}
