const plDate = (date: string) => {
  return new Intl.DateTimeFormat('pl-PL').format(Date.parse(date))
}

export default plDate
