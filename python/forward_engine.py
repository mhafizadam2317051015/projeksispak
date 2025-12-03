#!/usr/bin/env python3
import sys
import json
import os

def safe_load(path):
    with open(path, 'r', encoding='utf-8') as f:
        return json.load(f)

def main():
    if len(sys.argv) < 2:
        print(json.dumps({"status": False, "error": "no input file"}))
        return

    file_path = sys.argv[1]

    if not os.path.exists(file_path):
        print(json.dumps({"status": False, "error": "file not found"}))
        return

    try:
        payload = safe_load(file_path)
    except Exception as e:
        print(json.dumps({"status": False, "error": "bad json", "msg": str(e)}))
        return

    # normalize user input gejala
    selected = payload.get("gejala", [])
    if isinstance(selected, str):
        selected = [s.strip() for s in selected.split(',') if s.strip()]

    selected_set = set([s.upper().strip() for s in selected])
    total_input = len(selected_set)

    diseases = payload.get("diseases", [])
    results = []

    for d in diseases:
        kode = d.get("kode")
        nama = d.get("nama")
        gejala_list = d.get("gejala") or []

        # normalize gejala list
        gejala_norm = [g.upper().strip() for g in gejala_list if g]

        # hitung kecocokan
        matched = len(set(gejala_norm) & selected_set)

        if matched == 0:
            continue  # skip penyakit yang tidak cocok sama sekali

        # rumus yang kamu minta:
        # persentase = (matched / total input user) * 100
        percent = (matched / total_input) * 100 if total_input > 0 else 0

        results.append({
            "kode": kode,
            "nama": nama,
            "matched": matched,
            "total_input_user": total_input,
            "persentase": round(percent, 2)
        })

    # sort: persentase tertinggi → gejala cocok terbanyak
    results_sorted = sorted(results, key=lambda x: (-x["persentase"], -x["matched"]))

    print(json.dumps({
        "status": True,
        "hasil": results_sorted
    }))

if __name__ == "__main__":
    main()
