let input_img_preview_file = "";
export function input_img_preview(
    input_id: string,
    img_id: string | ((url: string, file: File) => void)
) {
    const input = document.getElementById(input_id) as HTMLInputElement;
    if (!input) return;
    const handler = (event) => {
        const file = input.files?.item(0);
        if (!file) return;
        input_img_preview_file && URL.revokeObjectURL(input_img_preview_file);
        input_img_preview_file = URL.createObjectURL(file);
        if (typeof img_id == "string") {
            const img = document.getElementById(img_id) as HTMLImageElement;
            if (!img) return;
            img.src = input_img_preview_file;
        } else {
            img_id(input_img_preview_file, file);
        }
    };
    input.addEventListener("change", handler);
    return () => {
        input.removeEventListener("change", handler);
    };
}
