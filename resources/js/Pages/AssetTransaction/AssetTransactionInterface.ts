export interface IAssetTransaction {
    id: number;
    fi_asset?: IFound;
    stock_asset?: {
        id: number;
        codeCVM: string;
        issuingCompany: string;
        companyName: string;
        tradingName: string;
        cnpj: string;
        marketIndicator: string;
        typeBDR: string;
        dateListing: string;
        status: string;
        segment: string;
        segmentEng: string;
        type: string;
    };
    asset_code: string;
    transaction_type: string;
    quantity: number;
    price: number;
    transaction_date: string;
}

export interface IFound {
    id: number;
    acronym: string;
    fundName: string;
    companyName: string;
    type: "FIAGRO" | "FII";
    segment: string | null;
}
