#!/usr/bin/env python3
import yaml
from pathlib import Path
from typing import List

class IndentedListDumper(yaml.Dumper):
    def increase_indent(self, flow=False, indentless=False):
        return super(IndentedListDumper, self).increase_indent(flow, False)

def find_yaml(directory: Path) -> List[Path]:
    return list(directory.rglob('*.yaml')) + list(directory.rglob('*.yaml'))

for yaml_file in find_yaml(Path.cwd()):
    with open(yaml_file) as f:
        data = yaml.safe_load(f)
    with open(yaml_file, 'w') as f:
        yaml.dump(data, f, Dumper=IndentedListDumper, default_flow_style=False, sort_keys=False, allow_unicode=True, indent=2)
