const map = {
    'NEW': 'Новый',
    'SCHEDULED': 'Назначено собеседование',
    'ACCEPTED': 'Принят',
    'REFUSAL': 'Отказ'
}

export function statusDeMap(status) {
    return map[status]
}