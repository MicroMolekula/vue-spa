const status = {
    Новый: 'NEW',
    "Назначено собеседование": 'SCHEDULED',
    Принят: 'ACCEPTED',
    Отказ: 'REFUSAL',
}

export function getStatusCode(name) {
    return status[name];
}

