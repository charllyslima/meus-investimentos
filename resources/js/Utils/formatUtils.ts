export const formatMoney = (amount: number): string => {
    return new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL',
    }).format(amount);
};

export const formatDate = (dateString: string, showTime: boolean = true): string => {
    const date = new Date(dateString);
    const options = {
        day: 'numeric',
        month: 'numeric',
        year: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
    };

    const formattedDate = new Intl.DateTimeFormat('pt-BR', options).format(date);

    if (!showTime) {
        return formattedDate.split(',').shift()!;
    }

    return formattedDate;
};
