const formatter = (numb) => {
    numb = numb == "" ? 0 : parseInt(numb);
    const rupiah = new Intl.NumberFormat("en-ID", {
        style: "currency",
        currency: "IDR",
    })
        .format(numb)
        .replace(/[IDR]/gi, "")
        .replace(/(\.+\d{2})/, "")
        .trimLeft();

    return rupiah;
};
