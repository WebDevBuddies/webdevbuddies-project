export function makeMutations (types, fn) {
    const res = {}

    types.forEach(type => {
        res[type] = fn
    });
    return res
}
